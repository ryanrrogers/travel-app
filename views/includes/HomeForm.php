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
        <input type="text" id="departureCity" name="departureCity"><br><br>

        <label for="destination">Destination </label>
        <input type="text" id="destinationCity" name="arrivalCity"><br><br>

        <label for="departure_date">Depature Date </label>
        <input type="date" id="arrivalDate" name="arrivalDate"><br><br>

        <label for="return_date">Return Date </label>
        <input type="date" id="leaveDate" name="leaveDate"><br><br>

        <input type="submit" value="Submit" name="submit">

    </form>
    <!-- Need to add redirect to first pages -->
</div>