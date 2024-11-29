<?php   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class MaskDetectionController extends Controller
{
    public function detectMask(Request $request)
{
    // Validate that the 'image' field is present and is a base64 string
    $data = $request->validate([
        'image' => 'required|string',  // Ensure image is a base64 string
    ]);

    // Extract the base64 image string
    $imageData = $data['image'];

    // Process the image: decode the base64 and save temporarily
    $image = base64_decode(explode(',', $imageData)[1]);  // Decode base64 image
    $imageName = 'temp_image' . time() . '.jpg';  // Unique image name
    $filePath = public_path('images/' . $imageName);  // Save to the public/images directory
    file_put_contents($filePath, $image);  // Write the image to the file

    // Send the image to the Flask API
    $response = $this->sendToFlaskAPI($filePath);

    // Return the result from Flask and the image URL to the frontend
    return response()->json([
        'result' => $response,
        'imageUrl' => asset('images/' . $imageName) // Return the URL of the generated image
    ]);
}

    private function sendToFlaskAPI($imagePath)
    {
        try {
            // Create a Guzzle HTTP client
            $client = new Client();

            // Make a POST request to the Flask API with the image as base64
            $response = $client->post('http://127.0.0.1:5000/predict', [
                'json' => [
                    'image' => base64_encode(file_get_contents($imagePath))  // Send base64 encoded image
                ]
            ]);

            // Parse and return the JSON response from Flask API
            $result = json_decode($response->getBody(), true);
            return $result['prediction'] ?? 'Error in Flask API response';
        } catch (\Exception $e) {
            // Handle the error and log it or return a meaningful message
            \Log::error('Flask API request failed: ' . $e->getMessage());
            return 'Error while communicating with Flask API';
        }
    }

// In your controller
public function uploadImage(Request $request)
{
    // Assuming the image URL is obtained after uploading or selecting the image
    $imageUrl = $request->input('image_url'); // or however you get the image URL

    // Store the image URL in the session
    session(['imageUrl' => $imageUrl]);

    // Redirect to the share_to_social_media route
    return redirect()->route('share_to_social_media');
}

    public function showShareToSocialMedia()
{
    // Retrieve the imageUrl and result from the session
    $imageUrl = session('imageUrl');
    $result = session('result');

    return view('share_to_social_media', compact('imageUrl', 'result'));
}

    public function index()
{
    return view('login');
}
}