<?php require_once('_parts'. DIRECTORY_SEPARATOR .'header.php'); ?>

<div id="calendar-vue">

    <modal-add-calendar></modal-add-calendar>

    <calendars-list></calendars-list>

    <div class="container">

        <div class="calendar-container">

            <calendar calendar="<?php echo $calendar->id(); ?>"></calendar>

        </div> <!-- end calendar-container -->

    </div> <!-- end container -->

</div>

<?php require_once('_parts' . DIRECTORY_SEPARATOR . 'footer.php'); ?>