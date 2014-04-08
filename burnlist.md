----
Burnlist: notes, mini bugs, etc
----
04/1/14
----
[x] update print ad copy
update css
check wp browsers
check wp mobile
check wp ipad
check links

[x] add <abbr>
[x] add .no-bullet
[x] style tabular data
[x] style <dl>s



----
03/31/14
----
# Launch List

404 Search button [x]

Subscribe to Magazine





### Bugs
- Search input btn [x]

- Footer not pushing down [x]

- Footer lacks bg pattern [x]

- Newsletter button is floating above form [x]



### Other

- Hide comment & Share count till site is trafficked [LB] [x]

- No view all button at bottom [send]

- Email script [x]

- Check final paths in modernizr.js [hold]

- Newsletter photo update? [x]










03/26/14

[] 'View All' Button on Homepage

[x] Logo tagline bumped right

[x] Search Input special WP markup

[] What does list of all issues look like?

[] .add-social Search Icon should hide

[] Placeholder img content

[] Email Security (john's .js)

[] Short page footer issue



# Changes for Integration
# Notes for WP

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

    Reference changelog for info about read and share count markup changes




# Open

[] Featured Lists

    - show disqus share count (yikes!)


[] Site Footer

    - needs to stay down on short pages

[] Blog pages

    - comment counts


[] Rolls pages

    - pagination on mobile


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
