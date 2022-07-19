<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\AdminRequest;
use App\Models\Category;


class AdminController extends Controller
{
    public function allData() {
        $contact = new Contact;
        return view('admin', ['data' => $contact->orderBy('created_at', 'desc')->get()]);
    }

    public function showOneMessage($id) {
        $contact = new Contact;
        return view('admin-one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
        $contact = new Contact;
        return view('admin-update', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, AdminRequest $req) {
        $contact = Contact::find($id);
        $contact->status = 'Решена';

        if($req->file('file') != null) {
            $contact->image_after = substr($req->file('file')->store('public/image') , 13);
        }

        $contact->save();

        return redirect()->route('admin-update', $id)->with('success', 'Статус заявки был изменен');
    }

    public function deleteMessage($id) {
        $contact = new Contact;
        return view('admin-delete', ['data' => $contact->find($id)]);
    }

    public function deleteMessageSubmit($id,  AdminRequest $req) {
        $contact = Contact::find($id);
        $contact->status = 'Отклонена';
        $contact->disprove_reason = $req->input('text');

        $contact->save();

        return redirect()->route('admin-delete', $id)->with('success', 'Статус заявки был изменен');
    }

    public function categoryAdmin() {
        $category = new category;
        return view('messages', ['data' => $category->orderBy('created_at', 'desc')->get()]);
    }

    public function categoryAdminSubmit(AdminRequest $new) {
        $category = new category;
        $category->category = $new->input('category');

        $category->save();

        return redirect()->route('admin-category-submit')->with('success', 'Категория была добавлена');
    }
    
    public function categoryDelete($id, $category) {

        $contact = new Contact;
        Contact::where('category', $category)->delete();

        category::find($id)->delete();
        return redirect()->route('admin-category-submit')->with('success', 'Категори была удалина');
    }

}
