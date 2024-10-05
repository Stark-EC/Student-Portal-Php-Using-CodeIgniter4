namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\StudentCourseModel;
use CodeIgniter\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->findAll();  // Fetch all courses
        return view('courses', $data);  // Load the view 'courses.php'
    }

    public function registeredCourses()
    {
        $studentCourseModel = new StudentCourseModel();
        // Assuming you are fetching data based on logged-in student ID
        $student_id = session()->get('student_id');
        $data['registered_courses'] = $studentCourseModel->getRegisteredCourses($student_id);
        return view('registered_courses', $data);  // Load the view 'registered_courses.php'
    }

    public function register()
    {
        // Registration logic here
    }
}
