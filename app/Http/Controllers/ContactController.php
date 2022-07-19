<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {

        $contact = new Contact();
        $contact->id_user = Auth::user()->id;
        $contact->title = $req->input('title');
        $contact->login = Auth::user()->login;
        $contact->category = $req->input('category');
        $contact->message = $req->input('message');
        $contact->status = 'Новая';
        $contact->image_after = 'null';
        $contact->disprove_reason = '';

        if($req->file('file') != null) {
            $contact->image = substr($req->file('file')->store('public/image') , 13);
        }

        $contact->save();

        return redirect()->route('contact')->with('success', 'Заявка была добавлена');
    }
    public function allData() {
        $contact = new Contact;
        return view('dashboard', ['data' => $contact->orderBy('created_at', 'desc')->get()]);
    }

    public function showOneMessage($id) {
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function allDataUser() {
        $contact = new Contact;
        return view('user-data', ['data' => $contact->orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get()]);
    }

    public function showOneMessageUser($id) {
        $contact = new Contact;
        return view('user-one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
        $contact = new Contact;
        return view('user-update', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {
        $contact = Contact::find($id);
        $contact->title = $req->input('title');
        $contact->message = $req->input('message');
        $contact->status = 'Новая';

        if($req->file('file') != null) {
            $contact->image = substr($req->file('file')->store('public/image') , 13);
        }

        $contact->save();

        return redirect()->route('user-update', $id)->with('success', 'Заявка была изменена');
    }

    public function deleteMessage($id) {
        Contact::find($id)->delete();
        return redirect()->route('user-data')->with('success', 'Заявка была удалина');
    }

    public function showCategory() {
        $category = new category;
        return view('contact', ['data' => $category->get()]);
    }

}
