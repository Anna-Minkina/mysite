<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;//подключение валидатора КонтактРиквэста
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();//сохранение в бд

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');//переадрессация на главную страницу
    }

    public function allData() {

        //return view('messages', ['data'=> Contact::all()]);

        $contact = new Contact;
        return view('messages', ['data' => $contact->all()]);
        }

        public function showOneMessage($id) {
            $contact = new Contact;
            return view('one-message', ['data' => $contact->find($id)]);
        }

        public function updateMessage($id) {
            $contact = new Contact;
            return view('update-message', ['data' => $contact->find($id)]);
        }

        public function updateMessageSubmit($id, ContactRequest $req) {

            $contact = Contact::find($id);//не хочу создавать новую запись, хочу обновить запись, которая уже есть
            $contact->name = $req->input('name');
            $contact->email = $req->input('email');
            $contact->subject = $req->input('subject');
            $contact->message = $req->input('message');
    
            $contact->save();//сохранение в бд
    
            return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
        }

        public function deleteMessage($id) {

            Contact::find($id)->delete();
            return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');

        }
    }
        
        //return view('messages', ['data' => $contact->where('subject', '=', 'Что то интересное')->get()]);
        //можно также указывать <>,>,<. 'data' - какие данные мы передадим внутрь шаблона 'messages'. 
        //Название у этого параметра (данных) может быть абсолютно любым. Данные можно передавать любые, 
        //хоть 'Hello', хоть Contact::all()
    
        //return view('messages', ['data' => $contact->orderBy('id', 'asc')->skip(1)->take(1)->get()]);
        //это пример того, как можно строить запрос в бд с разной сортировкой
  
        //$contact = new Contact;
        //dd($contact->all()); или одно и то же
        //dd(Contact::all());это 2я часть этого большого коммента
    
        //Изначально был класс Request, пока не создали ContactRequest
        //dd($req); вернет объект класса Request, а именно массив со всеми данными

        //dd($req->input('subject'));input позволяет вернуть конкретные данные

/*$validation = $req->validate([ // метод  validate позволяет проводить валидацию
    по указанным элементам массива. Но в итоге создали ContactRequest и валидацию сделали там.
    'subject' => 'required|min:5|max:50',
    'message' => 'required|min:15|max:500'
]);*/
    

