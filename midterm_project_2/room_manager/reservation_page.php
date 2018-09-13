<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="../assets/css/reservation_page.css">

<div class='wrapper'>

  <main class='main_reservation_page' role='main'>

    <section class='form_section'>

      <form action="index.php" method="post">

        <!-- This line will dictate the action -->
        <input type="hidden" name="action" value="make_reservation" />

        <h3 class='font'>From</h3>

        <div class='date_time_div'>
          <p>Year</p>
          <p>Month</p>
          <p>Day</p>
          <p>Time</p>
        </div>

        <div class='date_time_div'>

        <select name='year_from'>
          <option value='2018'>2018</option>
          <option value='2019'>2019</option>
          <option value='2020'>2020</option>
        </select>

        <select name='month_from'>
          <option value='01'>Jan</option>
          <option value='02'>Feb</option>
          <option value='03'>Mar</option>
          <option value='04'>Apr</option>
          <option value='05'>May</option>
          <option value='06'>Jun</option>
          <option value='07'>Jul</option>
          <option value='08'>Aug</option>
          <option value='09'>Sept</option>
          <option value='10'>Oct</option>
          <option value='11'>Nov</option>
          <option value='12'>Dec</option>
        </select>

        <select name='day_from'>
          <option value='01'>1</option>
          <option value='02'>2</option>
          <option value='03'>3</option>
          <option value='04'>4</option>
          <option value='05'>5</option>
          <option value='06'>6</option>
          <option value='07'>7</option>
          <option value='08'>8</option>
          <option value='09'>9</option>
          <option value='10'>10</option>
          <option value='11'>11</option>
          <option value='12'>12</option>
          <option value='13'>13</option>
          <option value='14'>14</option>
          <option value='15'>15</option>
          <option value='16'>16</option>
          <option value='17'>17</option>
          <option value='18'>18</option>
          <option value='19'>19</option>
          <option value='20'>20</option>
          <option value='21'>21</option>
          <option value='22'>22</option>
          <option value='23'>23</option>
          <option value='24'>24</option>
          <option value='25'>25</option>
          <option value='26'>26</option>
          <option value='27'>27</option>
          <option value='28'>28</option>
          <option value='29'>29</option>
          <option value='30'>30</option>
          <option value='31'>31</option>
        </select>

        <select name='time_from'>
          <option value='08:00:00'>8 AM</option>
          <option value='09:00:00'>9 AM</option>
          <option value='10:00:00'>10 AM</option>
          <option value='11:00:00'>11 AM</option>
          <option value='12:00:00'>12 PM</option>
          <option value='13:00:00'>1 PM</option>
          <option value='14:00:00'>2 PM</option>
          <option value='15:00:00'>3 PM</option>
          <option value='16:00:00'>4 PM</option>
          <option value='17:00:00'>5 PM</option>
        </select>

        </div>

        <h3 class='font'>To</h3>

        <div class='date_time_div'>
          <p>Year</p>
          <p>Month</p>
          <p>Day</p>
          <p>Time</p>
        </div>

        <div class='date_time_div'>

          <select name='year_to'>
            <option value='2018'>2018</option>
            <option value='2019'>2019</option>
            <option value='2020'>2020</option>
          </select>


          <select name='month_to'>
            <option value='01'>Jan</option>
            <option value='02'>Feb</option>
            <option value='03'>Mar</option>
            <option value='04'>Apr</option>
            <option value='05'>May</option>
            <option value='06'>Jun</option>
            <option value='07'>Jul</option>
            <option value='08'>Aug</option>
            <option value='09'>Sept</option>
            <option value='10'>Oct</option>
            <option value='11'>Nov</option>
            <option value='12'>Dec</option>
          </select>

          <select name='day_to'>
            <option value='01'>1</option>
            <option value='02'>2</option>
            <option value='03'>3</option>
            <option value='04'>4</option>
            <option value='05'>5</option>
            <option value='06'>6</option>
            <option value='07'>7</option>
            <option value='08'>8</option>
            <option value='09'>9</option>
            <option value='10'>10</option>
            <option value='11'>11</option>
            <option value='12'>12</option>
            <option value='13'>13</option>
            <option value='14'>14</option>
            <option value='15'>15</option>
            <option value='16'>16</option>
            <option value='17'>17</option>
            <option value='18'>18</option>
            <option value='19'>19</option>
            <option value='20'>20</option>
            <option value='21'>21</option>
            <option value='22'>22</option>
            <option value='23'>23</option>
            <option value='24'>24</option>
            <option value='25'>25</option>
            <option value='26'>26</option>
            <option value='27'>27</option>
            <option value='28'>28</option>
            <option value='29'>29</option>
            <option value='30'>30</option>
            <option value='31'>31</option>
          </select>

          <select name='time_to'>
            <option value='08:00:00'>8 AM</option>
            <option value='09:00:00'>9 AM</option>
            <option value='10:00:00'>10 AM</option>
            <option value='11:00:00'>11 AM</option>
            <option value='12:00:00'>12 PM</option>
            <option value='13:00:00'>1 PM</option>
            <option value='14:00:00'>2 PM</option>
            <option value='15:00:00'>3 PM</option>
            <option value='16:00:00'>4 PM</option>
            <option value='17:00:00'>5 PM</option>
          </select>

        </div>

        <h3 class='font'>Select Room</h3>
        <select name='room_id'>
          <?php foreach ($rooms as $room): ?>
            <option value="<?php echo $room['room_id']; ?>"><?php echo $room['room_name']; ?></option>
          <?php endforeach; ?>
        </select>

        <input type="submit" value="Make Reservation" />

      </form>

      <section>

        <h2 class='font'>Room Reservations</h2>
        <table>

          <tr>
            <th class='font'>Room Name</th>
            <th class='font'>Start Date and Time</th>
            <th class='font'>End Date and Time</th>
          </tr>

          <?php foreach ($all_reservations as $reservation): ?>
            <tr>
              <td><?php echo $reservation['room_name']; ?></td>
              <td><?php echo $reservation['start_date']; ?></td>
              <td><?php echo $reservation['end_date']; ?></td>
              <td>
                <form action="index.php" method="post">
                  <input type="hidden" name="action" value="delete_reservation">
                  <input type="hidden" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>">
                  <input class='input_style' type="submit" value="Delete">
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
        </table>

      </section>

    </section>

    <section class='image_section'>
    </section>

  </main>

</div>

<?php include '../view/footer.php'; ?>