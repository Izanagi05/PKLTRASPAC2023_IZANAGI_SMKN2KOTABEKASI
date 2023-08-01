<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Siswa;
use Illuminate\Http\Response;

class SiswaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSiswaGetAll()
    {
$siswa = Siswa::get()->all();
$response = $this->get('/getsiswaall');
$response->assertResponseStatus(200);
$ekspetasi = [
    "data" => $siswa,
    "message" => "Berhasil ambil data",
    "success" => true,
    "status" => 200
];



$response->seeJsonEquals($ekspetasi);//200 ok
}

public function testCreateSiswa(){
    $this->post('/postsiswa', []);
    $this->assertResponseStatus(500);
    $this->seeJsonEquals([
        'data' =>null,
        'message' => 'Gagal membuat',
        'success' => false,
        'status' => 500,
    ]);
    }

    public function testUpdateSiswa(){

            $id= Siswa::findOrFail('21');
            $this->put('/updatesiswa/'.$id->siswa_id, [
                'nama' => 'John Doe',
                'alamat' => 'Jl. Buntu No. 123',
            ]);

            $this->assertResponseStatus(422);
             // Memastikan bahwa respons JSON mengandung pesan kesalahan yang sesuai
    $this->seeJsonEquals([
        'data' =>null,
        'message' => 'Gagal update',
        'success' => false,
        'status' => 422,
    ]);
        }


public function testDeleteSiswa(){
    $id= Siswa::findOrFail('14');
    $this->delete('/deletesiswa/'.$id->siswa_id);
    $this->notSeeInDatabase('siswas',  ['siswa_id' => $id->siswa_id]);
    $this->assertResponseStatus(200);
}
}








// $this->put('/updatesiswa/'.$id, array_merge($siswaterbaru, ['siswa_id' => $getidsiswa->siswa_id] ));
 // $postTwo = Post::create([])

        // $siswaDataTest=[
        //     'nama' => 'kamuuu',
        //     'nis' => '979797',
        //     'alamat' => 'Mars',
        //     'lahir' => '2023-06-03',
        //     'kelas_id' => '2',
        // ];

        // // $Siswa = Siswa::factory()->create($siswaDataTest);
        // $this->assertResponseStatus(200);


        // $this->post('/postsiswa', $siswaDataTest);

        // $this->seeInDatabase('siswas', [ 'nama' => 'kamu',
        // 'nis' => '00992',
        // 'alamat' => 'kendari',
        // 'lahir' => '2023-06-03',
        // 'kelas_id' => '2']);
        // $Siswa=Siswa::factory()->count(5)->make();
        // $this->json('post','/postsiswa',$Siswa)
        // ->seeJson([
        //     'created' => true,
        // ]);

        // $this->seeJsonStructure(
        //     ['data' =>
        //         [
        //             'nama',
        //             'nis',
        //             'alamat',
        //             'lahir',
        //             'kelas_id',
        //             'updated_at',
        //             'created_at',
        //         ],
        //         "message" => "Berhasil membuat",
        //         "success" => true,
        //         "status" => 200
        //     ]);
        // $this->seeJson($siswaDataTest);
