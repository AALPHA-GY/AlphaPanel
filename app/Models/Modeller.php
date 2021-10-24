<?php

            namespace App\Models;
            
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class Modeller extends Model
            {
                use HasFactory;
                protected $table="modeller";
                protected $fillable=["id","baslik","seflink","kategori","resim","metin","anahtar","description","durum","sirano","created_at","updated_at"];
            }