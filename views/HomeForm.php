<style>
    .centered-card{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
</style>
<div class="centered-card">
    <form method="post">
        <label for="departure_city">Departure City </label>
        <input type="text" id="departure_city"><br><br>

        <label for="destination">Destination </label>
        <input type="text" id="destination"><br><br>

        <label for="departure_date">Depature Date </label>
        <input type="date" id="departure_date"><br><br>

        <label for="return_date">Return Date </label>
        <input type="date" id="return_date"><br><br>

        <label for="max_price">Maximum Hotel Price </label>
        <input type="text" id="max_price"><br><br>

        <input type="submit" value="Submit">

    </form>
    <!-- Need to add redirect to first pages -->
</div>