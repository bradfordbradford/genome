----
Burnlist: notes, mini bugs, etc
----


# Changes for Integration
# Notes for John

    _Files Updated_
    assets/fonts - replace directory
    assets/css/genome-main.css - replace file
    assets/js - replace directory

    _Markup Edited_
    Subscribe Dropdown/Door - data-icon='K' (changed icon 'h' envelope to 'K' arrow)
    Home Scroll to Content -
        change this: <a class='arrow-down alternate' href='#scroll'></a>
        to this: <a class='arrow-down alternate' href=''></a>

        change this: <section class='primary_layout' id='scroll'>
        to this: <section class='primary_layout' id='content-top'>

    Featured Scroll to Content -
        change this: <a class='arrow-down' data-icon='E' href='#scroll-here'></a>
        to this: <a class='arrow-down' data-icon='E' href=''></a>

        change this: <section class='featured_layout inner-bounds block' id='scroll-here'>
        to this: <section class='featured_layout inner-bounds block' id='top'>




# Open

[] Rolls pages

    - pagination on mobile

[ ] Blank pages

    - height doesn't push footer down


# Closed
== HOME ==

    [x] Home
        - continue reading line height and icon
        - featured article grid floats are backwards


== GENERAL ==

    [x] Video Overlay lags mfp-background
    [x] Check typography & grid sizes


== HEADER ==

    [x] Locks and Minifies

== Featured Article ==

    [x] Overlay
        [x] Single Image
        [x] Image Gallery
        [x] Video
    [x] Inline Gallery

== Hover States ==

    [x] collection media objects
        [x] comment counter
        [x] anything else?

    [x] feature overlay
        [x] Read this Feature prompt





# Stress Point Notes
== Range 3,2 (768 - 1224) ==

    Hero Feature, Inline Feature
        - Smaller text to avoid col collision, overflow past image height


== Range 3,2,1 (480 - 1224) ==

    Article: Feature

        Inline Slider
            - Directional Nav Hover: height issue
            - Caption extends past paper-white card


== Range 1,0 (0 - 768) ==

    Article: Basic/Primary Layout (blogs, columns)
        - Article to Full Bleed
        - Collections stay 3 Col

    ---

    Article: Feature
        Article P's & H's to Full Bleed

        Pull Elements (Quotes, Slideshows, Videos) to Full Bleed

        Hero Inline Feature
            - Smaller text to fit in

        Article Photo to Center

        Hero Content Increase Height to prevent Overflow

== Range 0 (0 - 480) ==

    Article: Feature

        Primary Content to Full Bleed








