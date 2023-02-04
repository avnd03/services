/*!
    * Start Bootstrap - SB Admin Pro v2.0.4 (https://shop.startbootstrap.com/product/sb-admin-pro)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under SEE_LICENSE (https://github.com/StartBootstrap/sb-admin-pro/blob/master/LICENSE)
    */
    window.addEventListener('DOMContentLoaded', event => {
    // Activate feather
    feather.replace();

    // Enable tooltips globally
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Enable popovers globally
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Activate Bootstrap scrollspy for the sticky nav component
    const stickyNav = document.body.querySelector('#stickyNav');
    if (stickyNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#stickyNav',
            offset: 82,
        });
    }

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sidenav-toggled'));
        });
    }

    // Close side navigation when width < LG
    const sidenavContent = document.body.querySelector('#layoutSidenav_content');
    if (sidenavContent) {
        sidenavContent.addEventListener('click', event => {
            const BOOTSTRAP_LG_WIDTH = 992;
            if (window.innerWidth >= 992) {
                return;
            }
            if (document.body.classList.contains("sidenav-toggled")) {
                document.body.classList.toggle("sidenav-toggled");
            }
        });
    }

    // Add active state to sidbar nav links
    let activatedPath = window.location.pathname.match(/([\w-]+\.html)/, '$1');

    if (activatedPath) {
        activatedPath = activatedPath[0];
    } else {
        activatedPath = 'index.html';
    }

    const targetAnchors = document.body.querySelectorAll('[href="' + activatedPath + '"].nav-link');

    targetAnchors.forEach(targetAnchor => {
        let parentNode = targetAnchor.parentNode;
        while (parentNode !== null && parentNode !== document.documentElement) {
            if (parentNode.classList.contains('collapse')) {
                parentNode.classList.add('show');
                const parentNavLink = document.body.querySelector(
                    '[data-bs-target="#' + parentNode.id + '"]'
                );
                parentNavLink.classList.remove('collapsed');
                parentNavLink.classList.add('active');
            }
            parentNode = parentNode.parentNode;
        }
        targetAnchor.classList.add('active');
    });

    /**
     * flatpickr
     */
    var flatpickrExamples = document.querySelectorAll("[data-provider]");
    Array.from(flatpickrExamples).forEach(function (item) {
      if (item.getAttribute("data-provider") == "flatpickr") {
        var dateData = {};
        var isFlatpickerVal = item.attributes;
        if (isFlatpickerVal["data-date-format"])
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        if (isFlatpickerVal["data-enable-time"]) {
          (dateData.enableTime = true),
          (dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString() + " H:i");
        }
        if (isFlatpickerVal["data-altFormat"]) {
          (dateData.altInput = true),
          (dateData.altFormat = isFlatpickerVal["data-altFormat"].value.toString());
        }
        if (isFlatpickerVal["data-minDate"]) {
          dateData.minDate = isFlatpickerVal["data-minDate"].value.toString();
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-maxDate"]) {
          dateData.maxDate = isFlatpickerVal["data-maxDate"].value.toString();
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-deafult-date"]) {
          dateData.defaultDate = isFlatpickerVal["data-deafult-date"].value.toString();
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-multiple-date"]) {
          dateData.mode = "multiple";
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-range-date"]) {
          dateData.mode = "range";
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-inline-date"]) {
          (dateData.inline = true),
          (dateData.defaultDate = isFlatpickerVal["data-deafult-date"].value.toString());
          dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
        }
        if (isFlatpickerVal["data-disable-date"]) {
          var dates = [];
          dates.push(isFlatpickerVal["data-disable-date"].value);
          dateData.disable = dates.toString().split(",");
        }
        flatpickr(item, dateData);
      } else if (item.getAttribute("data-provider") == "timepickr") {
        var timeData = {};
        var isTimepickerVal = item.attributes;
        if (isTimepickerVal["data-time-basic"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.dateFormat = "H:i");
        }
        if (isTimepickerVal["data-time-hrs"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.dateFormat = "H:i"),
          (timeData.time_24hr = true);
        }
        if (isTimepickerVal["data-min-time"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.dateFormat = "H:i"),
          (timeData.minTime = isTimepickerVal["data-min-time"].value.toString());
        }
        if (isTimepickerVal["data-max-time"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.dateFormat = "H:i"),
          (timeData.minTime = isTimepickerVal["data-max-time"].value.toString());
        }
        if (isTimepickerVal["data-default-time"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.dateFormat = "H:i"),
          (timeData.defaultDate = isTimepickerVal["data-default-time"].value.toString());
        }
        if (isTimepickerVal["data-time-inline"]) {
          (timeData.enableTime = true),
          (timeData.noCalendar = true),
          (timeData.defaultDate = isTimepickerVal["data-time-inline"].value.toString());
          timeData.inline = true;
        }
        flatpickr(item, timeData);
      }
    });

});
