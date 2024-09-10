<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('header')
    <title>Document</title>
</head>
<body>
    <div id='app'>
        @{{message}}
        <div class='midden'>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                
                </tbody>
            </table>
        </div>
        
    </div>
</body>
<script>
    const app = Vue.createApp({
        data(){
            return{
                message:'test',
            };
        },
    }).mount('#app')
    </script>
</html>