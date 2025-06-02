<div {{ $attributes }}>
    <h1 class="text-6xl">Welcome!</h1>  
    <h2 class="text-2xl">Login your account</h2>
    <form action="/dashboard" class="grid col-2 w-100 m-auto">
        <input type="text" id="username" placeholder="Username" class="col-span-2 bg-[#d9dfbc] p-2 rounded-md w-100 m-2">
        <input type="password" id="username" placeholder="Password" class="col-span-2 bg-[#d9dfbc] p-2 rounded-md w-100 m-2">
        <span class="text-start">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
        </span>
        <a href="/" class="text-end">Forgot Password?</a>
        <div class="col-span-2">
            <input type="button" value="Back" class="bg-[#78838a] px-5 py-3 rounded-xl text-white w-40 my-20 hover:underline">
            <input type="submit" value="Sign in" class="bg-[#6b8b7a] px-5 py-3 rounded-xl text-white w-40 my-20 hover:underline">
        </div>
    </form>
</div>