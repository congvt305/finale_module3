<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Services\Implement\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function list()
    {
        $contacts = $this->contactService->getAll();
        return view('admin.contact.list', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(ContactRequest $request)
    {
        $this->contactService->create($request);
        return redirect()->route('contact.index');
    }

    public function edit($id)
    {
        $contact = $this->contactService->findById($id);
        return view('admin.contact.update', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        $this->contactService->update($request, $id);
        return redirect()->route('contact.index');
    }

    public function destroy($id)
    {
        $this->contactService->delete($id);
        return redirect()->route('contact.index');
    }

    public function show($id)
    {
        $contact = $this->contactService->findById($id);
        return view('admin.contact.show', compact('contact'));
    }



    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $contacts = Contact::where('first_name','LIKE','%'.$keyword.'%')->get();
        return view('list', compact('contacts'));

    }
}
