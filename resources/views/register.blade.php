@extends('layouts.app')

@section('content')
    <div class="container py-20 bg-cyan-50 h-dvh sm:px-0 sm:max-w-full">
      <div class="">
        <div class="flex content-center justify-center">
          <div class="border rounded bg-white items-center px-4 sm:px-16 sm:py-3">
            <div class="flex justify-center flex-col items-center">
              <div class="font-bold text-cyan-900 text-2xl pt-5">Sign Up</div>
              <div class="text-black">
                <div>
                  or
                  <div class="font-semibold text-cyan-800 inline">
                    <a href="/login">sign in to your account</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="m-4">
              <div class="p-3 border rounded-md m-3">
                <div><input class="w-50 sm:w-80" type="text" placeholder="Username"/></div>
              </div>
              <div class="p-3 border rounded-md m-3">
                <div><input class="w-50 sm:w-80" type="text" placeholder="Email"/></div>
              </div>
              <div class="p-3 border rounded-md m-3">
                <div><input class="w-50 sm:w-80" type="password" placeholder="Password"/></div>
              </div>
              <div class="p-3 border rounded-md m-3">
                <div><input class="w-50 sm:w-80" type="password" placeholder="Confirm Password"/></div>
              </div>
            </div>
            <div class="flex justify-center pb-5">
              <button class="border rounded-md px-4 py-2 bg-cyan-500 text-white font-bold">
                Sign Up
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
<style scoped>
.libre-baskerville-bold {
    font-family: "Libre Baskerville", serif;
    font-weight: 900;
    font-style: normal;
}
textarea:focus,
input:focus {
    outline: none;
}
</style>
