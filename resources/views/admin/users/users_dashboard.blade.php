<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Outfit&display=swap" rel="stylesheet">
    <link href="{{asset("css/app.css")}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
            integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background-color: rgba(107,162,146,0.1)">

<div class="w-50 h-10 bg-[#0C0B0D]"></div>

<div class="flex h-full">
    <div class="panel">
    </div>

    <div class="m-6" style="width: 100%">

        <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: #ff7720">
            Dashboard
        </h1>
        <h1 style="font-family:'Outfit',sans-serif;font-weight: lighter;font-size: 20px;color: #6b7280">
            Information about Users Present in the Restaurant
        </h1>

        <div style="display: flex;">
            <div style="width: 50%">
                <div>
                    <canvas id="myChart1" style="width:70%;margin: 20px;height: 500px;max-height: 500px"></canvas>
                    <script>
                        let cNames = [];
                        let cValues = [];
                        Chart.defaults.font.family = "'Outfit', sans-serif";
                        Chart.defaults.font.size = 15;

                        @foreach ($users as $usr)
                        cNames.push("{{$usr->name}}");
                        cValues.push({{$usr->counts}});
                        @endforeach

                        const max2 = Math.max(...cValues)
                        new Chart("myChart1", {
                            type: "bar",

                            data: {
                                datasets: [
                                    {
                                        data: cValues,
                                        label: "Logins",
                                        backgroundColor: "#ff7720"
                                    }],
                                labels: cNames
                            },
                            options: {
                                scales: {
                                    x: {
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        max: max2 + 1,
                                        alignToPixels: true,
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>


                <div>
                    <canvas id="myChart2"
                            style="width:70%;margin: 20px;display: none;height: 500px;max-height: 500px"></canvas>
                    <script>
                        let cNames1 = [];
                        let cValues1 = [];
                        Chart.defaults.font.family = "'Outfit', sans-serif";
                        Chart.defaults.font.size = 15;

                        @foreach ($users as $usr)
                        cNames1.push("{{$usr->name}}");
                        cValues1.push({{$usr->counts}});
                        @endforeach

                        new Chart("myChart2", {
                            type: "pie",
                            data: {
                                datasets: [
                                    {
                                        data: cValues,
                                        label: "Logins",
                                        backgroundColor: "#ff7720"
                                    }],
                                labels: cNames
                            },
                        });
                    </script>
                </div>
                <div class="tab">
                    <button class="tablinks" onclick="showSubCategories()"> Bar Chart</button>
                    <button class="tablinks" onclick="showCategories()"> Pie chart</button>
                </div>
                <script>
                    function showSubCategories() {
                        document.getElementById("myChart1").style.display = "block";
                        document.getElementById("myChart2").style.display = "none";
                    }

                    function showCategories() {
                        document.getElementById("myChart1").style.display = "none";
                        document.getElementById("myChart2").style.display = "block";
                    }
                </script>
            </div>

            <div class="m-6">
                <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: #ff7720">
                    Users</h1>

                <p style="font-family: 'Outfit',sans-serif;"> Top 5 most common users</p>

                <div class="h-10"></div>
                <table>
                    <tr style="margin-bottom:10px">
                        <th> User</th>
                        <th> Date Joined</th>
                        <th> Number of Logins</th>

                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    @foreach ($common_users as $common_user)

                        <tr>


                            <td style=""> {{$common_user->name}}</td>
                            <td class="joined"> {{$common_user->joined}}</td>
                            <td> {{$common_user->counts}}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <script>
            let dates = document.getElementsByClassName("joined");
            for (let i = 0; i < dates.length; i++) {
                let tmp = new Date(dates[i].innerHTML).toLocaleDateString('en-us', {
                    weekday: "long",
                    year: "numeric",
                    month: "short",
                    day: "numeric"
                });
                dates[i].innerHTML = tmp;
            }
        </script>

        <hr>
        <div>

            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px;color: black;margin: auto;text-align: center">
                Last 5 new users
            </h1>
            <div class="h-10"></div>
            <table style="margin: auto;width: 100%">
                <tr style="margin-bottom:10px">
                    <th> User Id</th>
                    <th> Full Name</th>
                    <th> Username</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Date Joined</th>

                </tr>
                <tr>
                    <td></td>
                </tr>
                @foreach ($new_users as $new_user)

                    <tr>


                        <td style=""> {{$new_user->id}}</td>
                        <td> {{$new_user->fullname}}</td>
                        <td>{{$new_user->username}}</td>
                        <td> {{$new_user->email}}</td>
                        <td> {{$new_user->telephone}}</td>
                        <td class="joined"> {{$new_user->created_at}}</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>


    </div>

    <div style="border-left: solid 1px rgba(0,0,0,0.1);height: 100%" class="px-6 my-6">
        <div style="display: flex;justify-content: center;margin-bottom: 30px">
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 30px" class="text-center">
                Hello <span style="color:#FF9F1C"> {{$user->fullname}}</span>
            </h1>
        </div>
        <div class="avatar-image">
            <div style="margin: auto;border-radius: 9999px;background-color: #1b171d;width: 100px;height: 100px"></div>
        </div>


        <div>
            <h1 style="font-family: 'Outfit',sans-serif;font-weight: bold;font-size: 23px;color:#ff7720">
                Insights
            </h1>

            <h3 style="color: #6b7280" class="text-center"> A look into how things are faring on</h3>

            <div class="flex justify-between mx-10  flex-wrap">

                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5  rounded-3xl shadow-lg hover:shadow-2xl flex justify-between flex-col text-center">

                    <i class="fa-solid fa-list fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Categories
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{$total_categories}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col text-center">
                    <i class="fa-solid fa-list-1-2 fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Sub Categories
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_subcategories}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col text-center">
                    <i class="fa-solid fa-users fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Users
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_users}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                    <i class="fa-solid fa-shopping-cart fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px"> Orders
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_orders}}</div>
                </div>
                <div style="background-color: rgba(230,96,1,0.2);width: 10rem"
                     class="m-5 p-5 rounded-3xl bg-white shadow-lg	hover:shadow-2xl flex justify-between flex-col w-40 text-center">
                    <i class="fa-solid fa-utensils fa-2xl my-5"></i>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: lighter;font-size: 15px">
                        Menus
                    </div>

                    <div
                        style="font-family: 'Outfit', sans-serif;font-weight: bold;font-size: 18px">{{ $total_menus}}</div>
                </div>
            </div>


        </div>
    </div>

</div>


</body>
</html>
