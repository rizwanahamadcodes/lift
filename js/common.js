// modal
jQuery(function ($) {
    $(".team").on("click", function () {
        var team_img = $(this).find("img").attr("src");
        var team_name = $(this).find(".lowerContent h3").text();
        var team_position = $(this).find(".lowerContent p").text();
        var team_info = $(this).find(".hiddenContent").html();
        $("#photo_modal").attr("src", team_img);
        $("#memberName").text(team_name);
        $("#memberPosition").text(team_position);
        $("#memberContent").html(team_info);
        $("#galleryModal").modal("show");
    });
});
jQuery(document).ready(function ($) {
    $(".components li").addClass("s_border");
});
// Fixed Navbar
jQuery(function ($) {
    $(window).on("scroll", function (event) {
        var scrollValue = $(window).scrollTop();
        if (scrollValue > 100) {
            $("#navWrap").addClass("affix");
        } else {
            $("#navWrap").removeClass("affix");
        }
    });
});
// Fixed chooseWrap
jQuery(function ($) {
    $(window).on("scroll", function (event) {
        var scrollValue = $(window).scrollTop();
        if (scrollValue > 700) {
            $("#chooseWrap").addClass("affix");
        } else {
            $("#chooseWrap").removeClass("affix");
        }
    });
});

jQuery(function ($) {
    $(window).scroll(function () {
        if (screen.width >= 768) {
            if ($(window).scrollTop() > 400) {
                $(".detail_sidebar").css("position", "fixed");
                $(".detail_sidebar").css("top", "80px");
                $(".detail_sidebar").css("left", "105px");
                $(".detail_sidebar").css("width", "277.5px");
            } else if ($(window).scrollTop() <= 400) {
                $(".detail_sidebar").css("position", "");
                $(".detail_sidebar").css("top", "");
                $(".detail_sidebar").css("right", "");
                $(".detail_sidebar").css("width", "");
            }
            if ($(".detail_sidebar").length) {
                if (
                    $(".detail_sidebar").offset().top +
                        $(".detail_sidebar").height() >
                    $("footer").offset().top
                ) {
                    $(".detail_sidebar").css(
                        "top",
                        -(
                            $(".detail_sidebar").offset().top +
                            $(".detail_sidebar").height() -
                            $("footer").offset().top
                        )
                    );
                }
            }
        }
    });
});

jQuery(function ($) {
    $('[data-toggle="tooltip"]').tooltip();
});

/*
	Smooth scroll functionality for anchor links (animates the scroll
	rather than a sudden jump in the page)
*/
jQuery(function ($) {
    $(".js-anchor-link").click(function (e) {
        e.preventDefault();
        var target = $($(this).attr("href"));
        if (target.length) {
            var scrollTo = target.offset().top;
            $("body, html").animate({ scrollTop: scrollTo + "px" }, 400);
        }
    });
});

jQuery(function ($) {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal",
    });

    $("#dismiss, .overlay").on("click", function () {
        $("#sidebar").removeClass("active");
        $(".overlay").fadeOut();
    });

    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").addClass("active");
        $(".overlay").fadeIn();
        $(".collapse.in").toggleClass("in");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
});

jQuery(function ($) {
    var maxHeight = 0;

    $(".feature_info").each(function () {
        if ($(this).height() > maxHeight) {
            maxHeight = $(this).height();
        }
    });

    $(".feature_info").height(maxHeight);
});

jQuery(document).ready(function ($) {
    $("a[href*='#']").on("click", function (e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $(target).offset().top,
                },
                600,
                function () {
                    location.hash = target; //attach the hash (#jumptarget) to the pageurl
                }
            );

        return false;
    });
});

jQuery(document)
    .scroll(function ($) {
        var scrollDistance = jQuery(window).scrollTop();

        // Show/hide menu on scroll
        //if (scrollDistance >= 850) {
        //		$('nav').fadeIn("fast");
        //} else {
        //		$('nav').fadeOut("fast");
        //}

        // Assign active class to nav links while scolling
        jQuery(".page-section").each(function (i) {
            if ($(this).position().top <= scrollDistance) {
                $(".navigation a.active").removeClass("active");
                $(".navigation a").eq(i).addClass("active");
            }
        });
    })
    .scroll();

document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector("#topNav");
    const triggerElement = document.querySelector("#navScrollTrigger");
    if (!nav || !triggerElement) return;
    // Set up the Intersection Observer
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    nav.classList.remove("scrolled");
                } else {
                    nav.classList.add("scrolled");
                }
            });
        },
        {
            rootMargin: "0px",
            threshold: 0,
        }
    );

    observer.observe(triggerElement);
});

document.addEventListener("DOMContentLoaded", () => {
    // Select elements
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const closeNavButton = document.querySelector("#closeNavButton");
    const modal = document.querySelector(".mobile-nav-modal");
    const navModalWrapper = document.querySelector(".nav-modal-wrapper");

    // Function to toggle modal visibility
    function toggleModal() {
        modal.classList.toggle("modal-open");
    }

    // Function to close the modal
    function closeModal() {
        modal.classList.remove("modal-open");
    }

    // Add event listener for hamburger button
    hamburgerBtn.addEventListener("click", toggleModal);

    // Add event listener for close button
    closeNavButton.addEventListener("click", closeModal);

    // Add event listener for clicking outside modal (only on the wrapper, not its children)
    navModalWrapper.addEventListener("click", (event) => {
        if (event.target === navModalWrapper) {
            closeModal();
        }
    });
});
document.addEventListener("DOMContentLoaded", () => {
    const listItemsWithDropdown = document.querySelectorAll(".has-dropdown");
    if (listItemsWithDropdown.length === 0) return;
    listItemsWithDropdown.forEach((listItemWithDropdown) => {
        const toggleLink = listItemWithDropdown.querySelector(
            "[data-custom-toggle='dropdown']"
        );
        if (!toggleLink) return;
        toggleLink.addEventListener("click", (e) => {
            e.preventDefault();
            listItemsWithDropdown.forEach((listItem) => {
                if (e.target.parentElement === listItem) {
                    listItem.classList.toggle("droppeddown");
                } else {
                    listItem.classList.remove("droppeddown");
                }
            });
        });

        document.addEventListener("click", (e) => {
            if (e.target != toggleLink) {
                listItemWithDropdown.classList.remove("droppeddown");
            }
        });
    });
});
