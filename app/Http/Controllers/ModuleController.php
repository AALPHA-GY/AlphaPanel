<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Modeller;
use App\Models\Kategoriler;
use File;
class ModuleController extends Controller
{
    function __construct()
    {



        view()->share('moduller',Modeller::whereDurum(1)->get());


    }

    public function index(){
        return view("admin.include.moduller");




    }
    public function modulekle(Request $request)
    {
        $request->validate([
            "baslik"=>'required|string',

         ]); 
         $baslik=$request->baslik; 
         $seflink=Str::of($baslik)->slug('');
         $kontrol=Modeller::whereSeflink($seflink)->first();
         if($kontrol){

            return redirect()->route('moduller')->with('hata','bu modül daha önce eklenmiştir.');
         }
         else{


////modelleri olulturma
         Modeller::create([ 
             "baslik"=>$baslik, 
             "seflink"=>$seflink 
            ]); 
//kategoriler oluşturma
            Kategoriler::create([
                "baslik"=>$baslik,
                "seflink"=>$seflink,
                "tablo"=>"modul",
                "sirano"=>1


            ]);
            // dinamik tablo oluşturma işlemi
            Schema::create($seflink, function (Blueprint $table) {
                $table->id();
                $table->string('baslik',255);
                $table->string('seflink',255);
                $table->string('resim',255)->nullable();
                $table->longtext('metin')->nullable();
                $table->unsignedBigInteger('kategori')->nullable();
                $table->string('anahtar',255)->nullable();
                $table->string('description',255)->nullable();
                $table->enum('durum',[1,2])->default(1);
                $table->integer('sirano')->nullable();
                $table->timestamps();
                $table->foreign('kategori')->references('id')->on('kategoriler')->onDelete('cascade');
            });
            //Model oluşturma
            $modelDosyasi='<?php

            namespace App\Models;
            
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class '.ucfirst($seflink).' extends Model
            {
                use HasFactory;
                protected $table="'.$seflink.'";
                protected $fillable=["id","baslik","seflink","kategori","resim","metin","anahtar","description","durum","sirano","created_at","updated_at"];
            }';
            File::put(app_path('Models')."/".ucfirst($seflink).'.php',$modelDosyasi);
            return redirect()->route('moduller')->with('basarili','İşleminizi başaralı');
         }
        
    }
}
