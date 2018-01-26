<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

        <div class="content" id="app">
            <div class="title m-b-md">
               <p>@{{ message }}</p>
            </div>
        </div>
            
        </div>
        <div class="content" id="app-2">
                  <span v-bind:title='message'>
                    Подержи курсор надо мной пару секунд,
                    чтобы увидеть динамически связанное значение title!
                  </span>
        </div>
        
        <div class="content"  id="app-3">
            <p v-if="seen">Сейчас меня видно</p>
        </div>

        <div class="content"  id="app-4">
                <input type="text"><input type='button' value="Add New" id="button">
              <ol>
                <li v-for="todo in todos">
                  @{{ todo.text }}
                </li>
              </ol>
        </div>

            <div class="content"  id="app-5">
              <p>@{{ message }}</p>
              <button v-on:click="reverseMessage">Обратить порядок букв в сообщении</button>
            </div>

            <div class="content"  id="app-6">
              <p>@{{ message }}</p>
              <input v-model="message">
            </div>
            <div class="content">
                <hr>
            </div>

    </div>
        <!-- <script type="text/javascript" src="js/app.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script type="text/javascript">
            (function(){
                var app = new Vue({
                    el: '#app',
                    data: {
                        message: 'Hello Vue.js!',
                    },
                });
                var app2 = new Vue({
                  el: '#app-2',
                  data: {
                    message: 'Вот когда вы загрузили эту страницу: ' + new Date()
                  }
                });

                var app3 = new Vue({
                  el: '#app-3',
                  data: {
                    seen: true
                  }
                });
                document.getElementById("app-3").addEventListener('click', function(){
                    app3.seen = false;
                });

                var app4 = new Vue({
                  el: '#app-4',
                  data: {
                    todos: [
                      { text: 'Посадить дерево' },
                      { text: 'Построить дом' },
                      { text: 'Вырастить сына' }
                    ]
                  }
                });
 
                document.getElementById("button").addEventListener('click', function(){
                    var newItem = document.querySelector('input[type="text"').value;
                    app4.todos.push({ text: newItem });
                });

                var app5 = new Vue({
                  el: '#app-5',
                  data: {
                    message: 'Hello Vue.js!'
                  },
                  methods: {
                    reverseMessage: function () {
                      this.message = this.message.split('').reverse().join('')
                    }
                  }
                });

                var app6 = new Vue({
                  el: '#app-6',
                  data: {
                    message: 'Hello Vue!'
                  }
                });

            })();
        
        </script>

    </body>
</html>
