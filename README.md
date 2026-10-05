# Monti Framework

Welcome to **Monti**, A modular PHP framework, built for developers who want to build web applications with simplicity, speed, and scalability.

## Introduction

Monti is built to offer a smooth and powerful development experience, with a modular architecture that lets you reuse code across your project.

## Core Values

Monti is based on four fundamental principles:

- **Simplicity**: Low learning curve to get started quickly.
- **Scalability**: Suitable for projects of any size, from one-page sites to CRMs and eCommerce platforms.
- **Speed**: Fast installation, startup, customization, and development.
- **Customization**: Easily modify the code to fit your unique needs.

## Features

Monti includes a complete set of tools for modern development:

### 1. Integrated MVC

Ready-to-use Model-View-Controller structure:

```php
// Model
namespace App\Modules\ModuleName;
class MyModel extends \App\System\MVC\Model {
    // your code here
}

// Controller
namespace App\Modules\ModuleName;
class MyController extends \App\System\MVC\Controller {
    public function welcome() {
        return view("welcome", ["message" => "Hello World!"]);
    }
}

// View (welcome.php)
<?= $message ?>
```

### 2. Modules
The primary way to extend Monti's capabilities and bring your ideas to life. Write the code once and reuse it as many times as you want.

### 3. Routing
Simple and configurable HTTP request handling:

```php
router()->get("/", function() {
    return view("home");
});

//Grouped routes
router()->group("users", function($group) {
    // /users/login
    $group->post("/login", "MyController@myLoginMethod");
    //or $group->post("/login", [MyController::class, "myLoginMethod"]);
});

router()->get("/another-route", ...);
```

### 4. Middlewares
Inspect, filter or short-circuit HTTP requests before they reach your code, with a standard, PSR-15 compliant middleware pipeline:

```php
class IsLogged {
    public function process($request, $handler) {
        if(!\Auth::isLogged()) {
            return redirect(url("users.login"));
        }
        return $handler->handle($request);
    }
}

router()->get("/dashboard", "Dashboard@index")
    ->middleware(IsLogged::class);
```

#### Installation
Check out the [official documentation](https://www.montiphpframework.com/docs) to get started.

#### License
This project is distributed under the Apache License, Version 2.0. Read LICENSE and NOTICE files for more informations.

# Bring your next project to life with Monti!