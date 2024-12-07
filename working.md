first Item ndra Model create pannikalam including m f..

then goto migrations , give these fields
            $table->integer('user_id')->Index();
            $table->string('name');
            $table->float('price', 8 , 2);
            $table->boolean('status');

and go to Model file 
-> give fillable or guarded
->create the relation between item and user
    public function user(){
    return $this->belongsTo(User::class);
    }
->then go to the User Model and assign the relationship btwn User and Item
    public function item(){
    return $this->hasMany(Item::class);
    }

basic ah inga enna panrom naa, user model la item oda relationship solrom.. item model la user oda relationship solrom

then we want some data 

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->boolean()

        ];

$ php artisan tinker

    > App\Models\Item::factory()->count(3)->create(['user_id' => 1]);


    

        
