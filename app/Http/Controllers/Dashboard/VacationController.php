<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use App\Models\Employee;
use App\Models\Vacation;
use App\Models\Department;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Notifications\AddVacation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Dashboard\VacationRequest;

class VacationController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('permission:الاجازات', ['only' => ['index']]);
        $this->middleware('permission:أضافة أجازه', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل الاجازه', ['only' => ['update','edit']]);
        $this->middleware('permission:حذف الاجازه', ['only' => ['destroy']]);
        $this->middleware('permission:طباعة الاجازه', ['only' => ['print']]);
        $this->middleware('permission:طباعة الاجازه العارضه', ['only' => ['printEmergancy']]);
    }

    public function index()
    {
        $vacations = Vacation::orderBy('created_at', 'desc')->with('vacationEmployee')->paginate(10);
        $employees = Employee::all();
        return view('dashboard.vacations.index', compact('vacations', 'employees'));
    }


    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('dashboard.vacations.add', compact('employees','departments'));
    }

    public function store(VacationRequest $request)
    {
        try {
            DB::beginTransaction();

            $vacation = new Vacation();
            $vacation->type = $request->type;
            $vacation->start = $request->start;
            $vacation->to = $request->to;
            $vacation->notes = $request->notes;
            $vacation->created_by = Auth::user()->name;
            $vacation->status = 'approve';

            if ($request->type === 'mission') {
                $vacation->int_ext = $request->int_ext;
                if ($request->int_ext === 'internal') {
                    $vacation->department_id = $request->department_id;
                } else {
                    $vacation->department_id = null;
                }
                $vacation->acting_employee_id = null;
            } else {
                $vacation->acting_employee_id = $request->acting_employee_id;
                $vacation->int_ext = null;
                $vacation->department_id = null;
            }

            $vacation->save();
            $vacation->vacationEmployee()->attach($request->employee_id);

            // Upload img
            $this->verifyAndStoreFile($request, 'photo', 'vacations/', 'upload_image', $vacation->id, 'App\Models\Vacation');


                      //Notifications
  // Notifications: ارسال الإشعار للمستخدمين الذين لديهم دور "super-admin"
  $superAdmins = User::whereHas('roles', function ($query) {
    $query->where('name', 'super-admin');
})->get();            $vacationNotify = Vacation::latest()->first();
            Notification::send($superAdmins, new AddVacation($vacationNotify));


            DB::commit();
            return response()->json(['success' => 'تم أضافة أجازة الموظف بنجاح']);
        } catch (\Exception $e) {
            DB::rollback(); // Ensure rollback on failure
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }







    /**
     * Display the specified resource.
     */
    public function show($id)
    {

//
    }

    public function edit($id)
    {
        $vacation = Vacation::findOrFail($id);
        $employees = Employee::all();
        $departments = Department::all();

        return view('dashboard.vacations.edit', compact('vacation', 'employees','departments'));
    }


    // Start Update Vacation
    public function update(VacationRequest $request, $id)
{
    // تحقق مما إذا كانت قيمة status موجودة ومقبولة
    if (!$request->has('status') || !in_array($request->status, ['pending', 'approve', 'reject'])) {
        // إذا لم تكن قيمة status موجودة أو غير مقبولة، اضبطها إلى 'pending' كقيمة افتراضية
        $request->request->set('status', 'pending');
    }

    $vacation = Vacation::findOrFail($id);
    $vacation->type = $request->type;
    $vacation->start = $request->start;
    $vacation->to = $request->to;
    $vacation->notes = $request->notes;
    $vacation->status = $request->status;

    $vacation->acting_employee_id = $request->acting_employee_id;
    if ($request->type === 'mission') {
        $vacation->int_ext = $request->int_ext;
        if ($request->int_ext === 'internal') {
            $vacation->department_id = $request->department_id;
        } else {
            $vacation->department_id = null;
        }
        $vacation->acting_employee_id = null;
    } else {
        $vacation->acting_employee_id = $request->acting_employee_id;
        $vacation->int_ext = null;
        $vacation->department_id = null;
    }
    $vacation->save();

    // تحديث جدول ال pivot
    $vacation->vacationEmployee()->sync($request->employee_id);

    // تحديث المرفقات
    if ($request->has('photo')) {
        // حذف المرفق القديم
        if ($vacation->image) {
            $old_img = $vacation->image->filename;
            $this->Delete_attachment('upload_image', 'vacations/' . $old_img, $request->id);
        }
        // رفع الصورة
        $this->verifyAndStoreFile($request, 'photo', 'vacations/', 'upload_image', $vacation->id, 'App\Models\Vacation');
    }

    // إرجاع الرد بناءً على نوع الطلب
    if ($request->ajax()) {
        return response()->json(['success' => 'تم تعديل بيانات الموظف بنجاح']);
    } else {
        return redirect()->route('dashboard.vacations.index')->with('success', 'تم تعديل الأجازة بنجاح');
    }
}
    // End Update Vacation

    // Start Delete Vacation
    public function destroy(Request $request)
    {
        // معالجة الحذف الفردي
        if ($request->page_id == 1) {
            $vacation = Vacation::findOrFail($request->id);
            if ($request->filename && $vacation->image) {
                $this->Delete_attachment('upload_image', 'vacations/' . $vacation->image->filename, $request->id, $vacation->image->filename);
            }
            $vacation->Delete();
            return response()->json(['success' => 'Vacation deleted successfully']);
        }

    }

    // End Delete Vacation
// Start Restore Delete Vacation
    public function restore(Request $request)
    {
        // معالجة استعادة العنصر الفردي
        if ($request->page_id == 1) {
            $restoreData = Vacation::onlyTrashed()->findOrFail($request->id);
            $restoreData->restore();
            return response()->json(['success' => 'Vacation restored successfully']);
        }

        // معالجة استعادة العناصر المحددة
        $delete_select_id = explode(",", $request->delete_select_id);
        foreach ($delete_select_id as $vacation_id) {
            $vacation = Vacation::onlyTrashed()->findOrFail($vacation_id);
            $vacation->restore();
        }

        return response()->json(['success' => 'Vacations restored successfully']);
    }

// End Restore Delete Vacation

    public function print($id)
    {
        $vacation = Vacation::findorfail($id);
        $employee = Employee::all();
        $department = Employee::all();

        return view('dashboard.vacations.print', compact('vacation','employee','department'));
    }


    public function printEmergancy($id)
    {
        $vacation = Vacation::findorfail($id);
        $employee = Employee::all();
        $department = Department::all();
        $vac = Vacation::all();


        return view('dashboard.vacations.print-emergency', compact('vacation','vac','employee','department'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $type = $request->input('type');
        $employeeId = $request->input('employee_id');
        $start = $request->input('start');
        $to = $request->input('to');
        $query = Vacation::query();

        if ($searchTerm) {
            $query->where('type', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('vacationEmployee', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
        }

        if ($type) {
            $query->where('type', $type);
        }

        if ($employeeId) {
            $query->whereHas('vacationEmployee', function ($q) use ($employeeId) {
                $q->where('employees.id', $employeeId); // Specify the table name
            });
        }

        // Apply date range filter
    if ($start && $to) {
        $query->whereBetween('created_at', [$start,$to]);
    }

        $vacations = $query->orderBy('created_at', 'desc')->paginate(5);

        $employees = Employee::all();

        return view('dashboard.vacations.searchvacation', [
            'vacations' => $vacations,
            'search' => $searchTerm,
            'type' => $type,
            'employee_id' => $employeeId,
            'employees' => $employees,
            'start' => $start,
            'to' => $to,
        ]);
    }

    public function vacationDetalis($id)
{

    $vacation = Vacation::findorfail($id);

    return view('dashboard.vacations.show-vacation-employee', compact('vacation'));
}

}

