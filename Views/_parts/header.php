<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Calendar!</title>
  </head>

  <style>
  body {
  background: #ccc;
  font: 87.5%/1.5em "Lato", sans-serif;
  margin: 0;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

td {
  padding: 0;
}

.container {
  left: 50%;
  position: fixed;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.calendar-container {
  position: relative;
  width: 450px;
}

.calendar-container header {
  border-radius: 1em 1em 0 0;
  background: #e66b6b;
  color: #fff;
  padding: 3em 2em;
}

.day {
  font-size: 8em;
  font-weight: 900;
  line-height: 1em;
}

.month {
  font-size: 4em;
  line-height: 1em;
  text-transform: lowercase;
}

.calendar {
  background: #fff;
  border-radius: 0 0 1em 1em;
  -webkit-box-shadow: 0 2px 1px rgba(0, 0, 0, 0.2), 0 3px 1px #fff;
  box-shadow: 0 2px 1px rgba(0, 0, 0, 0.2), 0 3px 1px #fff;
  color: #555;
  display: inline-block;
  padding: 2em;
}

.calendar thead {
  color: #e66b6b;
  font-weight: 700;
  text-transform: uppercase;
}

.calendar td {
  padding: 0.5em 1em;
  text-align: center;
}

.calendar tbody td:hover {
  background: #cacaca;
  color: #fff;
}

.current-day {
  color: #e66b6b;
}

.prev-month,
.next-month {
  color: #cacaca;
}

.ring-left,
.ring-right {
  position: absolute;
  top: 230px;
}

.ring-left {
  left: 2em;
}

.ring-right {
  right: 2em;
}

.ring-left:before,
.ring-left:after,
.ring-right:before,
.ring-right:after {
  background: #fff;
  border-radius: 4px;
  -webkit-box-shadow: 0 3px 1px rgba(0, 0, 0, 0.3), 0 -1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: 0 3px 1px rgba(0, 0, 0, 0.3), 0 -1px 1px rgba(0, 0, 0, 0.2);
  content: "";
  display: inline-block;
  margin: 8px;
  height: 32px;
  width: 8px;
}

td.has-event {
  background-color: #ececec;
}

  </style>
  <body>