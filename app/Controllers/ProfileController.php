namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $student_id = session()->get('student_id');
        $profileModel = new ProfileModel();
        $data['student'] = $profileModel->find($student_id);
        return view('profile', $data);  // Load the view 'profile.php'
    }
}
