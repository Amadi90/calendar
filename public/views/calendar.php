<?php require_once('_parts'. DIRECTORY_SEPARATOR .'header.php'); ?>

<div id="calendar-vue">

    <modal-add-calendar></modal-add-calendar>
    <modal-add-event></modal-add-event>

    <calendars-list></calendars-list>

    <div class="container">
        <div class="calendar-container">

            <header>
                <div class="day"><?php echo $carbon->now()->day; ?></div>
                <div class="month"><?php echo $carbon->now()->format('F'); ?></div>
            </header>

            <table class="calendar">
                <thead>
                    <tr>
                        <?php for($i = 0; $i < 7; $i++): ?>
                            <td><?php echo $carbon->startOfWeek()->addDay($i)->format('D'); ?></td>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td colspan="<?php echo $carbon->startOfMonth()->dayOfWeek - 1; ?>"></td>
                        <!-- <td colspan="3" class="prev-month">29</td> -->
                        <?php for($i = 0; $i < $carbon->daysInMonth; $i++) : ?>

                            <?php if($carbon->startOfMonth()->addDay($i)->dayOfWeek == 1) : ?>
                                <tr>
                            <?php endif; ?>
                            <?php
                                $class = ($currentDate->day === $carbon->startOfMonth()->addDay($i)->day) ? 'current-day' : '';
                                $class .= (!empty($calendar->events($carbon->startOfMonth()->addDay($i)))) ? ' has-event' : '';

                                if($class){
                                    $class = trim($class);
                                    $class = ' class="'. $class .'"';
                                }

                                $dateString = $carbon->year . '-';
                                $dateString .= $carbon->format('m') .'-';
                                $dateString .= $carbon->startOfMonth()->addDay($i)->format('d');
                            ?>
                            <td<?php echo $class; ?> @click.prevent="addEvent" date="<?php echo $dateString; ?>"><?php echo $carbon->startOfMonth()->addDay($i)->format('j'); ?></td>

                            <?php if($carbon->startOfMonth()->addDay($i)->dayOfWeek == 7) : ?>
                                </tr>
                            <?php endif; ?>

                        <?php endfor; ?>

                    </tr>

                </tbody>
            </table>

            <div class="ring-left"></div>
            <div class="ring-right"></div>

        </div> <!-- end calendar-container -->

    </div> <!-- end container -->

</div>

<?php require_once('_parts' . DIRECTORY_SEPARATOR . 'footer.php'); ?>