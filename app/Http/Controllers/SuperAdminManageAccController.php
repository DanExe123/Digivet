<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\SuperadminManageAccount;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class SuperAdminManageAccController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vetClinics = SuperadminManageAccount::all();

        // Return a view with the vet clinics data
        return view('SuperAdmin.SuperAdminManageAcc', compact('vetClinics'));
    }


    public function updateStatus(Request $request, $id)
    {
        // Find the vet clinic account by ID
        $vetClinic = SuperadminManageAccount::find($id);
    
        if (!$vetClinic) {
            return redirect()->back()->with('error', 'Vet clinic not found.');
        }
    
        // Update the status based on the request
        $vetClinic->status = $request->status;
        
        // Update the corresponding clinic's status
        $clinic = Clinic::where('user_id', $vetClinic->user_id)->first(); // Assuming user_id links to the clinic
    
        if ($clinic) {
            $clinic->status = $request->status; // Update the clinic's status
            $clinic->save(); // Save changes to the clinics table
        } else {
            return redirect()->back()->with('error', 'Related clinic not found.');
        }
    
        // Save the changes to the SuperadminManageAccount
        $vetClinic->save();
    
        return redirect()->back()->with('success', 'Vet clinic status updated successfully to ' . $request->status . '.');
    }
    


   // Function to delete a vet clinic
   public function destroy($id)
   {
       $vetClinics = SuperadminManageAccount::find($id);

       if (!$vetClinics) {
           return redirect()->back()->with('error', 'Vet clinic not found.');
       }

       $vetClinics->delete();

       return redirect()->back()->with('success', 'Vet clinic deleted successfully.');
   }


public function showDocuments($id)
{
    $vetClinic = SuperadminManageAccount::find($id);

    if (!$vetClinic) {
        return redirect()->back()->with('error', 'Vet clinic not found.');
    }

    // Decode the JSON to get the document paths
    $documents = json_decode($vetClinic->clinic_documents, true);

    // Debugging output
    \Log::info('Clinic Documents:', ['documents' => $documents]); // Check your Laravel log for this output

    // Return a view with the documents
    return view('SuperAdmin.ShowDocuments', compact('vetClinic', 'documents'));
}





public function sendEmailAlert($id)
{
     // Find the vet clinic by ID
     $vetClinic = SuperadminManageAccount::find($id);
    $email = $vetClinic->email; // Clinic's Gmail or email address

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                             // Enable SMTP authentication
        $mail->Username   = 'dnexus204@gmail.com';            // SMTP username (your Gmail account)
        $mail->Password   = 'robz skwu mmcr fjtv';                   // SMTP password (your Gmail app password)
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
        $mail->Port       = 587;                              // TCP port to connect to

        // Recipients
        $mail->setFrom('dnexus204@gmail.com', 'SuperAdmin_DigiVet');       // Your Gmail email and name
        $mail->addAddress($email, $vetClinic->name);             // Add recipient (clinic's email)

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Important Alert for Your Clinic';
        $mail->Body = '<h1>Hello, ' . $vetClinic->name . '</h1>' .
        '<img src="' . asset('logo/Veterinary Clinic System_20240517_125656_0000.png') . '" alt="Logo" style="max-width:200px;"/>' .
        '<p>Thank you for your continued partnership with us!</p>' .
        '<p>This is a confirmation alert regarding your recent request.</p>' .
        '<p>If you have any questions or need further assistance, please do not hesitate to reach out.</p>' .
        '<p>Best regards,<br>Digital Nexus</p>';


        $mail->AltBody = 'Hello, ' . $vetClinic->name . '. We have an important update for you.';

        // Send the email
        $mail->send();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email alert sent successfully!');

    } catch (Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('error', 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    }
}













}