<?php


namespace App\Http\Repositories\Eloquents;


use App\Contact;
use App\Http\Repositories\ContactRepositoryInterface;

class ContactRepository
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getAll()
    {
        return $this->contact->paginate(2);
    }

    public function storeOrUpdate($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->contact->findOrFail($id);
    }
}
