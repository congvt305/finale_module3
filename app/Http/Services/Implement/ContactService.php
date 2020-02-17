<?php


namespace App\Http\Services\Implement;


use App\Contact;
use App\Http\Repositories\Eloquents\ContactRepository;
use App\Http\Services\ContactServiceInterface;

class ContactService
{
    protected $contactRepo;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function getAll()
    {
        return $this->contactRepo->getAll();
    }

    public function create($request)
    {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->image = $this->uploadImage($request);
        $this->contactRepo->storeOrUpdate($contact);
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            $image_name = 'no_img_jpg';
        } else {
            $image = $request->file('image');
            $image_name = '' . date('H-i-s') . '' . $image->getClientOriginalName();
            $image->storeAs('public', $image_name);
        }
        return $image_name;
    }

    public function update($request, $id)
    {
        $contact = $this->contactRepo->findById($id);
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request);
            unlink('public'. $contact->image);
        } else
            $image = $contact->image;

        $contact->fill($request->all());
        $contact->image = $image;

        $this->contactRepo->storeOrUpdate($contact);
    }

    public function delete($id)
    {
        $contact = $this->contactRepo->findById($id);
        unlink('public'. $contact->image);
        $this->contactRepo->delete($contact);    }

    public function findById($id)
    {
        return $this->contactRepo->findById($id);
    }
}
