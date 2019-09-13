<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Files;
use App\Helper\AdminHelper;
class FileController extends Controller
{
    public function index()
    {
        $files = Files::latest()->paginate(10);
            // Files Modelinden Kayıtları Sondan Başa Doğru, Sayfalama Yaparak Getiriyor Her Sayfada 10 Kayıt Bulunacak
        return view("admin.tables.files",compact("files"));
            // admin/tables/files.blade.php ye compact ile verileri files değişkeni ile yolladık
    }

    public function file_upload()
    {
        return view("admin.forms.file_upload");
    }

    public function store(Request $request)
    {
        $request->validate([
            "file" => "mimes:zip,jpeg,png,jpg,gif,rar,tar" // Gelen Dosyanın mime tipi kontorlü yapıldı burdaki tipler dışında dosyalara izin verilmiyor 
        ]);
        $file = $request->file("file");

        $File = new Files;
            // Files Modelini Dahil Ettik
        $File->name = $file->getClientOriginalName();
            // Dosyanın Orijinal Adı
        $File->extension = $file->getClientOriginalExtension();
            // Dosya Uzantısı
        $File->path = "uploads/".$file->getClientOriginalName();
            // Dosyanın Bulunduğu Dizin
        $File->size = $file->getClientSize();
            // Dosya Boyutu (bayt)
        $File->type = $file->getMimeType();
            // Mime Tipi
        $File->url = url("uploads") . "/" . $file->getClientOriginalName();
            // Bağlantısını almak için
        $destinationPath = 'uploads';
            //  Dizin
        $move = $file->move($destinationPath,$file->getClientOriginalName());
            // Taşıma işlemi. Geçici Dizinden Hedef Dizine Taşınıyor
        if ($move) {
            // Eğer Başarılı Bir Şekilde Taşınmış İse Dosya Bilgilerini Veri Tabanına Kaydedecek
            $File->save();
            // Kaydetme 
            $request->session()->flash("success","Dosya Başarıyla Yüklendi!");
            // Flashdata ile Kullanıcıya Geçici Mesaj Gönderme
        }else{
            $request->session()->flash("fail","Dosya Yüklenmedi!!!");
        }
        return back();
            // 
     
    }

    public function update(Request $request,Files $files)
    {
        $rename = AdminHelper::fileRename($files->name,$request->fileName);
        if ($rename) {
            $files->name = $request->fileName;
            $files->url =  url("uploads") . "/" . $request->fileName;
            $files->save();
            $request->session()->flash("success","Dosya Adı Değiştirildi");
        }else{
            $request->session()->flash("fail","Dosya Adı Değiştirilmedi");
        }
        return back();
    }

    public function destroy(Files $files,Request $request)
    {
        $delete = Storage::delete($files->name);
        if($delete){
            $files->delete();
            $request->session()->flash('success', "Dosya Silindi!");
        }else{
            $request->session()->flash('fail', "Dosya Silinmedi!!");
        }
        return back();
    }
}
