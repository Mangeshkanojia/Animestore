<?php
  include 'config.php';


 session_start();

 $user_id = $_SESSION['user_id'];

 if(!isset($user_id)){
  header("location:login.php");
 }

 if(isset($_POST['add_to_cart'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if(mysqli_num_rows($check_cart_numbers) > 0){
     $message[] = 'already added to cart!';
  }else{
     mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
     $message[] = 'product added to cart!';
  }

}

?>
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Document</title>
  </head>
  <style>
    .swiper-slide img {
      transform: translateY(-50%);
    }
  </style>
  <body>
    <header>
      <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 shadow-lg">
        <div
          class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl"
        >
          <a href="#" class="flex items-center">
            <img
              src="./images/logo-avengers.png"
              class="mr-3 h-6 sm:h-9"
              alt=""
              width=""
            />
            <span
              class="mx-[-11px] self-center text-xl whitespace-nowrap dark:text-[#5a36c0] font-extrabold"
              >NIME</span
            >
          </a>
          <div class="flex items-center lg:order-2">

            <a
              href="search_page.php"
              class="text-black  font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none"
              ><i class="fa fa-search text-1xl"></i></a
            >
            <a
              href="cart.php"
              class="text-black  font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none"
              ><i class="fa fa-shopping-cart text-1xl"></i></a
            >
            <a
              href="#"
              class="text-black  font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none"
              ><i class="fa fa-user text-1xl"></i></a
            >
            <button
              data-collapse-toggle="mobile-menu-2"
              type="button"
              class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
              aria-controls="mobile-menu-2"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <svg
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <svg
                class="hidden w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
          <div
            class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1"
            id="mobile-menu-2"
          >
            <ul
              class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
            >
              <li>
                <a
                  href="home.php"
                  class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 text-black"
                  >Home</a
                >
              </li>
              <li>
                <a
                  href="shop.php"
                  class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 text-black"
                  >Shop All</a
                >
              </li>
              <li>
                <a
                  href="orders.php"
                  class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 text-black"
                  >Orders</a
                >
              </li>
              <li>
                <a
                  href="contact.php"
                  class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 text-black"
                  >Contact</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="bg-white mt-5">
      <div
        class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12"
      >
        <div class="mr-auto place-self-center lg:col-span-7">
          <h1
            class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-black"
          >
            A Haven for Anime Enthusiasts
          </h1>
          <p
            class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400"
          >
            Anime stores are more than just retail outlets; they are sanctuaries
            for anime enthusiasts. When you step into an Anime store, you are
            transported into a world where your favorite characters and series
            come to life. The walls are adorned with posters and art prints of
            iconic anime characters, and the shelves are lined with DVDs,
            Blu-rays, manga volumes, and merchandise representing a vast array
            of anime titles.
          </p>
          <a
            href="#"
            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-black rounded-lg bg-cyan-400 hover:bg-cyan-400 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"
          >
            Get started
            <svg
              class="w-5 h-5 ml-2 -mr-1"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>
        </div>
        <div class="lg:mt-0 lg:col-span-5 lg:flex mt-10">
          <img
            src="./images/anw-min.webp"
            alt=""
            class="shadow-lg rounded-[50%] bg-purple-500"
          />
        </div>
      </div>
    </section>

    <div class="mb-10 md:mb-16 mt-5 border-t">
      <h2
        class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-4xl mt-5"
      >
        Collection
      </h2>
    </div>
    <div class="p-1 flex flex-wrap items-center justify-center">
      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img
            class="relative w-full"
            src="./images/toy-3762868_640.jpg"
            alt=""
          />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>
      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img
            class="relative w-full"
            src="./images/toy-5433584_640.jpg"
            alt=""
          />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>
      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img
            class="relative w-full"
            src="./images/killua-hunter-x-4253236_640.jpg"
            alt=""
          />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img
            class="relative w-full"
            src="./images/young-3760179_640.jpg"
            alt=""
          />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img
            class="relative w-full"
            src="./images/alicia-3764620_640.jpg"
            alt=""
          />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img class="relative w-full" src="./images/kotobukiya.jpg" alt="" />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img class="relative w-full" src="./images/lady.jpg" alt="" />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img class="relative w-full" src="./images/naruto.jpg" alt="" />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>

      <div
        class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg"
      >
        <div
          class="relative pt-10 px-10 flex items-center justify-center cursor-pointer"
        >
          <img class="relative w-full" src="./images/honoka.jpg" alt="" />
        </div>
        <div class="relative text-white px-6 pb-6 mt-6"></div>
      </div>
    </div>

    <div class="mb-10 md:mb-16">
      <h2
        class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-4xl mt-[50px]"
      >
        Most Popular
      </h2>
    </div>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <!-- text - start -->
        <!-- text - end -->

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
          <!-- product - start -->
          <div>
            <a
              href="productdetail.php"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />

              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->

          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/hinata.avif"
                loading="lazy"
                alt="Photo by Nick Karvounis"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Hinata</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$50.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->

          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/kotobukiya.jpg"
                loading="lazy"
                alt="Photo by Austin Wade"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Kotobukiya</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
              </div>
            </div>
          </div>
          <!-- product - end -->

          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/toy-3370202_640.jpg"
                loading="lazy"
                alt="Photo by Vladimir Fedotov"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Revoltech</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div class="natour">
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/sasuke-uchiha.jpg"
                loading="lazy"
                alt="Photo by Vladimir Fedotov"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Sasuke Uchiha</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$50.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />

              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />

              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />

              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <span class="text-sm text-gray-500 lg:text-base"></span>
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100"
            >
              <img
                src="./images/honoka.jpg"
                loading="lazy"
                alt="hinata"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />

              <span
                class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                >-50%</span
              >
            </a>

            <div
              class="flex items-start justify-between gap-2 rounded-b-lg p-4"
            >
              <div class="flex flex-col">
                <a
                  href="#"
                  class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                  >Honoka Kosaka</a
                >
                <!-- <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span> -->
              </div>

              <div class="flex flex-col items-end">
                <span class="font-bold text-gray-600 lg:text-lg">$20.99</span>
                <span class="text-sm text-red-500 line-through">$39.99</span>
              </div>
            </div>
          </div>
          <!-- product - end -->
        </div>

        <div class="mb-10 md:mb-16 mt-[80px]">
          <h2
            class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-4xl mt-5"
          >
            Shop By Anime
          </h2>
        </div>

        <div
          class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-4 xl:grid-cols-5"
        >
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3 mx-auto"
            >
              <img
                src="./images/Attack-on-Titan.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->

          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Black-clover.png"
                loading="lazy"
                alt=""
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Hunterx.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Naruto.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/My-hero-academia.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3 mx-auto"
            >
              <img
                src="./images/jo-jos-bizarre-adventur.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Death-note.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Haikyuu.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Dragon-ball.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
          <!-- product - start -->
          <div>
            <a
              href="#"
              class="group relative mb-2 block h-80 overflow-hidden rounded-[50%] w-[180px] h-[180px] lg:mb-3"
            >
              <img
                src="./images/Chainsaw-man.png"
                loading="lazy"
                alt="Photo by Fakurian Design"
                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
              />
            </a>
          </div>
          <!-- product - end -->
        </div>
      </div>
    </div>

    <footer class="bg-white dark:bg-gray-900">
      <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <a href="home.php" class="flex items-center">
              <img
                src="./images/logo-avengers.png"
                class="h-8 mr-3"
                alt="FlowBite Logo"
              />
              <span
                class="mx-[-11px] self-center text-xl whitespace-nowrap dark:text-[#5a36c0] font-extrabold"
                >NIME</span
              >
            </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
              <h2
                class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
              >
                COMPANY
              </h2>
              <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                  <a href="#" class="hover:underline">About</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Careers</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Barnd Center</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Bolg</a>
                </li>
              </ul>
            </div>
            <div>
              <h2
                class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
              >
                HELP CENTER
              </h2>
              <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                  <a href="#" class="hover:underline">Discord Server</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Twitter</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Facbook</a>
                </li>
                <li class="mb-4">
                  <a href="#" class="hover:underline">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr
          class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
        />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"
            >© 2023 <a href="#" class="hover:underline"></a>. All Rights
            Reserved.
          </span>
          <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
            <a
              href="#"
              class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
            >
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 8 19"
              >
                <path
                  fill-rule="evenodd"
                  d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="sr-only">Facebook page</span>
            </a>
            <a
              href="#"
              class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
            >
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 21 16"
              >
                <path
                  d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"
                />
              </svg>
              <span class="sr-only">Discord community</span>
            </a>
            <a
              href="#"
              class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
            >
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 17"
              >
                <path
                  fill-rule="evenodd"
                  d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="sr-only">Twitter page</span>
            </a>
            <a
              href="#"
              class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
            >
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="sr-only">GitHub account</span>
            </a>
            <a
              href="#"
              class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
            >
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="sr-only">Dribbble account</span>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="app.js"></script>
  </body>
</html>
