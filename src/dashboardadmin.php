<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['session_username_admin'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    </style>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: url("./burjo-katanya.jpg");
            background-size: cover;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center h-screen w-screen overflow-hidden">
    <div class="d-flex flex-col justify-content-center align-items-center h-full w-full backdrop-blur-sm">
        <div class="mb-20">
            <h1 class="fw-bold fs-2 text-center rounded-full bg-white pl-20 pr-20">Admin Dashboard</h1>
        </div>
        <div class="d-flex justify-content-center gap-x-10 w-full">
            <a type="button" class="col-2 overflow-x-auto relative shadow-2xl sm:rounded-lg p-2 backdrop-blur-md bg-white" href="adminRumah.php">
                <div class="d-flex justify-content-center">
                    <svg class="mt-4" width="70" height="80" viewBox="0 0 116 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.31086 37.8066V37.7311C7.31076 30.2777 9.53489 22.9913 13.7027 16.7911C17.8704 10.5908 23.7951 5.75461 30.7292 2.89257C37.6633 0.0305311 45.2961 -0.729106 52.6647 0.709498C60.0333 2.1481 66.8076 5.72049 72.1328 10.976C76.3226 8.92352 81.0026 8.06056 85.6557 8.48245C90.3087 8.90434 94.7537 10.5946 98.4995 13.3666C102.245 16.1386 105.146 19.8843 106.881 24.1899C108.617 28.4956 109.119 33.1935 108.333 37.7647C109.489 37.8712 110.61 38.213 111.627 38.7688C112.644 39.3246 113.535 40.0825 114.243 40.9951C114.952 41.9078 115.464 42.9556 115.746 44.0732C116.029 45.1908 116.076 46.3542 115.885 47.4908C112.067 70.2884 102.622 84.7183 87.5674 90.7887V96.4231C87.5674 99.7587 86.2323 102.958 83.8558 105.316C81.4793 107.675 78.2561 109 74.8953 109H41.1031C37.7422 109 34.519 107.675 32.1426 105.316C29.7661 102.958 28.431 99.7587 28.431 96.4231V90.7887C13.3766 84.7183 3.93164 70.2884 0.113125 47.4908C-0.0711629 46.3844 -0.0299553 45.2525 0.234309 44.1622C0.498573 43.0719 0.980524 42.0453 1.65164 41.1431C2.32275 40.241 3.16939 39.4816 4.14146 38.9099C5.11352 38.3383 6.19125 37.9659 7.31086 37.815V37.8066ZM15.7589 37.7311H24.207C24.207 32.1718 26.4321 26.8402 30.3929 22.9092C34.3537 18.9781 39.7257 16.7697 45.3271 16.7697C50.9285 16.7697 56.3005 18.9781 60.2613 22.9092C64.2221 26.8402 66.4472 32.1718 66.4472 37.7311H74.8953C74.8953 29.9481 71.7801 22.4838 66.235 16.9804C60.6898 11.4769 53.1691 8.38513 45.3271 8.38513C37.4851 8.38513 29.9643 11.4769 24.4192 16.9804C18.8741 22.4838 15.7589 29.9481 15.7589 37.7311ZM32.655 37.7311H57.9992C57.9992 34.3955 56.6641 31.1966 54.2876 28.8379C51.9111 26.4793 48.6879 25.1543 45.3271 25.1543C41.9663 25.1543 38.7431 26.4793 36.3666 28.8379C33.9901 31.1966 32.655 34.3955 32.655 37.7311ZM90.6593 37.7311H99.7072C100.345 35.2533 100.404 32.6636 99.8811 30.1594C99.3577 27.6553 98.2652 25.3028 96.687 23.2811C95.1088 21.2595 93.0864 19.6221 90.774 18.4937C88.4616 17.3653 85.9201 16.7756 83.3433 16.7697C81.3158 16.7697 79.3896 17.1219 77.5986 17.7675C79.094 20.1487 80.3274 22.7144 81.2736 25.4058C82.8826 25.0097 84.5734 25.0913 86.1362 25.6404C87.699 26.1894 89.0649 27.1819 90.0645 28.4945C91.0641 29.8071 91.6533 31.3822 91.759 33.0242C91.8648 34.6662 91.4824 36.3029 90.6593 37.7311ZM79.1193 92.2309H36.879V96.4231C36.879 97.535 37.3241 98.6013 38.1162 99.3875C38.9084 100.174 39.9828 100.615 41.1031 100.615H74.8953C76.0156 100.615 77.09 100.174 77.8821 99.3875C78.6743 98.6013 79.1193 97.535 79.1193 96.4231V92.2309ZM33.9053 83.8463H82.093C95.4916 79.5701 103.973 67.4796 107.555 46.1157H8.4429C12.0249 67.4796 20.5067 79.5701 33.9053 83.8463Z" fill="#486EF4" />
                    </svg>
                    <svg class="mt-4" width="60" height="70" viewBox="0 0 91 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M89.292 8.58521C89.7902 7.83848 90.0764 6.97051 90.1199 6.0739C90.1635 5.17728 89.9628 4.28566 89.5393 3.49416C89.1158 2.70267 88.4854 2.04098 87.7153 1.57971C86.9452 1.11843 86.0643 0.874866 85.1667 0.875H5.83334C4.93645 0.875463 4.05649 1.11919 3.28716 1.58021C2.51784 2.04124 1.88797 2.7023 1.46464 3.49299C1.04131 4.28369 0.840372 5.1744 0.883228 6.07026C0.926084 6.96612 1.21113 7.83358 1.708 8.58025L40.5417 66.8357V85.1667H25.6667V95.0833H65.3333V85.1667H50.4583V66.8357L89.292 8.58521ZM75.9045 10.7917L65.9878 25.6667H25.0122L15.0955 10.7917H75.9045Z" fill="#486EF4" />
                    </svg>
                </div>
                <h2 class="fw-bold text-center m-3">Menu Burjo</h2>
            </a>
            <a type="button" class="col-2 overflow-x-auto relative shadow-2xl sm:rounded-lg p-2 backdrop-blur-md bg-white" href="adminCart.php">
                <div class="d-flex justify-content-center">
                    <svg class="mt-4" xmlns="http://www.w3.org/2000/svg" width="80" height="70" fill="#486EF4" class="bi bi-card-list" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                    </svg>
                </div>
                <h2 class="fw-bold text-center mt-4">Daftar Pesanan</h2>
            </a>
        </div>
    </div>
</body>

</html>