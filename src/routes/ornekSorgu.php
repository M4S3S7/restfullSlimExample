<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

//örnek get methodu
$app->get('/getMetodu', function (Request $request, Response $response) {
  $db = new MySQL();
  try {
  $db =  $db->Connect();
  $courses = $db->query("SELECT * FROM isimler")->fetchAll(PDO::FETCH_OBJ);
  if(!empty($courses)){
    return $response
          ->withStatus(200)
          ->withHeader('Content-Type', 'application/json')
          ->withJson($courses);

  }else {
    return $response->withStatus(400);
  }

  } catch (\Exception $e) {
    return $response->withJson(
      array(
        "HATA" => array(
          "Hata Mesaji" => $e->getMessage(),
          "Kodu" => $e->getCode()
        )
      )
    );
    $db = null;
  }

});

//örnek get detay methodu
$app->get('/getMetodu/{id}', function (Request $request, Response $response) {
  $id = $request->getAttribute("id");

  $db = new MySQL();
  try {
  $db =  $db->Connect();
  $courses = $db->query("SELECT * FROM isimler Where id = $id")->fetchAll(PDO::FETCH_OBJ);
  if(!empty($courses)){
    return $response
          ->withStatus(200)
          ->withHeader('Content-Type', 'application/json')
          ->withJson($courses);

  }else {
    return $response->withStatus(400);
  }

  } catch (\Exception $e) {
    return $response->withJson(
      array(
        "HATA" => array(
          "Hata Mesaji" => $e->getMessage(),
          "Kodu" => $e->getCode()
        )
      )
    );
    $db = null;
  }

});

//örnek post methodu
$app->post('/PostMetodu/Ekle', function(Request $request, Response $response){
  $adı    =   $request->getParam("adı");
  $soyadı =   $request->getParam("soyadı");
  $db= new MySQL();
  try {
    $db= $db->Connect();
    $insert = "INSERT INTO isimler (adı, soyadı) VALUES(:isim, :soyisim)";
    $prepare = $db->prepare($insert);

    $prepare->bindparam("isim", $adı);
    $prepare->bindparam("soyisim", $soyadı);
    $ekle = $prepare->execute();
    if($ekle){
      return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->withJson(array(
        "Sonuc" => "Başarılı Post işlemi"
      ));
    }else {
      return $response->withStatus(400)->withHeader('Content-Type', 'application/json')->withJson(array(
        "Sonuc" => "Başarısız Post işlemi"
      ));
    }
  } catch (\Exception $e) {
    return $response->withJson(array(
      "Hata" => array(
        "Mesaj" => $e->getMessage(),
        "Hata Kodu" => $e->getCode()
      )
    ));
    $db= null;
  }
});

//Örnek Put Metodu
$app->put('/PutMetodu/update/{id}', function (Request $request, Response $response){
  $id = $request->getAttribute("id");
  if($id){
    $adı    =   $request->getParam("adı");
    $soyadı =   $request->getParam("soyadı");

    $db= new MySQL();
    try {
      $db = $db->Connect();
      $güncelle = "UPDATE isimler SET adı= :isim, soyadı= :soyisim where id = $id";
      $prepare = $db->prepare($güncelle);

      $prepare->bindParam("isim", $adı);
      $prepare->bindParam("soyisim", $soyadı);
      $güncellemeTamamla = $prepare->execute();
      if($güncellemeTamamla){
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->withJson(array(
          "Başarılı" => "Başarılı bir güncelleme"
        ));

      }else {
        return $response->withStatus(400)->withHeader('Content-Type', 'application/json')->withJson(array(
          "Başarısız" => "Başarısız Güncelleme"
        ));

      }
    } catch (\Exception $e) {
      return $response->withJson(array(
        "Hata" => array(
          "Mesaj" => $e->getMessage(),
          "Hata Kodu" => $e->getCode()
        )
      ));
      $db= null;
    }

  }else {
    return $response->withStatus(400)->withHeader('Content-Type', 'application/json')->withJson(array(
      "Hata" => array(
        "Mesaj" => "ID bilgisini eksik girdiniz"
      )
    ));
  }

});

//örnek silme methodu


?>
