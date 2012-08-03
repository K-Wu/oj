<?php
$app = new Slim();

$app->get('/', function () {
  Util::redirect('/home');
});

$app->get('/login', function () {
  $controller = new UserController();
  $controller->showLoginPage();
});

$app->post('/login', function () {
  $controller = new UserController();
  $controller->login();
});

$app->get('/logout', function () {
  fAuthorization::requireLoggedIn();
  $controller = new UserController();
  $controller->logout();
});

$app->get('/change/password', function () {
  fAuthorization::requireLoggedIn();
  $controller = new UserController();
  $controller->changePassword();
});

$app->post('/change/password', function () {
  fAuthorization::requireLoggedIn();
  $controller = new UserController();
  $controller->updatePassword();
});

$app->get('/home', function () {
  $controller = new HomeController();
  $controller->index();
});

$app->get('/sets', function () {
  $controller = new HomeController();
  $controller->showProblemSets();
});

$app->get('/page/:name', function ($name) {
  $controller = new HomeController();
  $controller->showPage($name);
});

$app->get('/problems', function () {
  $controller = new ProblemController();
  $controller->index();
});

$app->get('/submit', function () {
  fAuthorization::requireLoggedIn();
  $controller = new SubmitController();
  $controller->index();
});

$app->post('/submit', function () {
  fAuthorization::requireLoggedIn();
  $controller = new SubmitController();
  $controller->submit(fRequest::get('problem', 'integer'));
});

$app->get('/status', function () {
  $controller = new RecordController();
  $controller->index();
});

$app->get('/reports', function () {
  fAuthorization::requireLoggedIn();
  $controller = new ReportController();
  $controller->index();
});

$app->get('/dashboard', function () {
  fAuthorization::requireLoggedIn();
  $controller = new DashboardController();
  $controller->index();
});

$app->get('/problem', function () {
  Util::redirect('/problem/' . fRequest::get('id', 'integer'));
});

$app->get('/problem/:id', function ($id) {
  $controller = new ProblemController();
  $controller->show($id);
});

$app->get('/record', function () {
  Util::redirect('/record/' . fRequest::get('id', 'integer'));
});

$app->get('/record/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new RecordController();
  $controller->show($id);
});

$app->get('/report', function () {
  Util::redirect('/report/' . fRequest::get('id', 'integer'));
});

$app->get('/report/:id', function ($id) {
  fAuthorization::requireLoggedIn();
  $controller = new ReportController();
  $controller->show($id);
});

$app->run();