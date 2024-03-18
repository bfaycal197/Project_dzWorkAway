<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientExport;
use App\Mail\ExportMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function liste_client() {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function ajouter_client() {
        // Vous pouvez choisir de retourner une réponse vide ou un message JSON
        return response()->json(['message' => 'Cette route n\'est pas supportée pour l\'ajout de clients.'], 405);
    }

    public function ajouter_client_traitement(Request $request) {
        $request->validate([
            'name'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'PhoneNumber' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'Zip' => 'required',
            'cv' => 'nullable|file|mimes:pdf|max:2048', // Le CV doit être un fichier PDF de taille maximale 2MB
            'message' =>  'required',
        ]);
    
        // Enregistrer le fichier CV dans un emplacement spécifique
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv_files'); // Changez 'cv_files' pour le dossier de destination souhaité
        } else {
            $cvPath = null;
        }
    
        $client = new Client();
        $client->name = $request->name;
        $client->lastName = $request->lastName;
        $client->email = $request->email;
        $client->PhoneNumber = $request->PhoneNumber;
        $client->Address = $request->Address;
        $client->City = $request->City;
        $client->Zip = $request->Zip;
        $client->cv = $cvPath; // Enregistrer le chemin du fichier CV
        $client->message = $request->message;
        // $client->save();
    
        // Chemin du fichier PDF
        $pdfPath = $cvPath ? Storage::path($cvPath) : null;
    
        // Envoyer l'e-mail avec le fichier PDF en pièce jointe à l'adresse spécifiée
        $destinationEmail = 'faycalbabaahmed197@gmail.com';
        Mail::to($destinationEmail)->send(new ExportMail(null, $pdfPath, $request->name, $request->lastName));
    
        // Retourner une réponse JSON pour indiquer que le client a été ajouté avec succès
        return response()->json(['message' => 'Le client a été ajouté avec succès et le fichier PDF a été envoyé par e-mail à ' . $destinationEmail . '.'], 201);
    }
    
}
