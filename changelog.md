

# Contrib Changelog

## Timeline
* [02/27/2014]


[] change subscribe form-box icon to out arrow


- bugs-
[] overlay transitions

[] firefox bug

[] Finalize and send to John
--

[x] Read through CSS & HTML - check that code is dry and semantic

[x] HR with minicon

[x] tag list on article footer

[x] cat. list for aside

- design audit-
[x] remove featured hover bg, add read btn with book, add white full bleed bar with down-arrow

[x] check for css/html consistency for pull-outs

[x] secondar btn hover to primary

[x] grid+type





* [02/26/2014]
[x] For "full bleed" images on Home and Featured, can we apply the effects we discussed (https://medium.com/)? If you have changed your mind on how we should handle these sections, let me know!

[x] Print Style Basics

* [02/25/2014]
[x] responsive nav

[x] iPad Portrait - padding issue on offcanvas collapsible menu

[x] Touch Screens - don't show hover state, just click through

[x] social nav on features

[x] swap out close buttons for overlays

[x] prevent FOUC with body.init till bodyReady



* [02/24/2014]
[x] Home Hero - mobile (is pushed down below image content)
Modal Overlay BGs - transition issue in chrome
[x] AddThis - why it's not linking out




* [02/23/2014]
[x] Added load in animation for Featured Article Hero

[x] Fixed 'bumping' on css3 animations

[x] Refined how Hero images are handled

[x] Added scroll down prompt arrow, click to drop/slide to article

[x] Added button animation - icons roll up (ie. glasses to explore this issue, camera to watch video on feature)

[x] Fixed slideshow styles

[x] Lazy Load Images

[x] Feature Hero: Hover

[x] Social Icons
    These wack out too quickly under pressure.

[x] Made Browse Menu full bleed




* [02/21/2014]

[x] Should we consider adding an arrow to larger header area to prompt users to scroll? This is an older audience and just realized my oversight (only example that comes to mind: https://medium.com/p/8d43bcb650c5)
    Like it. Click it drop into the readable area.

[x] Add glasses symbol to Subscribe button (see purple top row of buttons for example: https://medium.com/p/8d43bcb650c5)

- Should link color shifts be dark blue, not gray?
    Like it. What shade?

[x] For 1-Across thumbnail, should entire text area link/be clickable? This will help on Mobile, too.
    Markup mistake: header is now clickable. Wou

**Feature**
[x] Should tagline be italicized serif to be consistent with columns & blogs?

[x] Body copy area width be greater (90%)

- Watch video button needs hover
    What sort of hover? Currently hover is an opacity shift in background color. Also, for hero area featureing a vid, the button has a special hover state like 'Explore this Issue'-switches to a video camera. Like?

[x] Slideshow captions don't look right
    Agree. Check them now.

[x] Watch video (aside) icon should be different

[x] fig caption should be sans serif (see comps)

**Blog**
[x] Rule beneath blockquote should match UI

**Column**
[x] Add Read Time icon & meta

[x] Related reading needs more top margin, less bottom margin

**Blog Roll**
[x] Should all meta (including author) be sans in this view since text is so tiny?
    Agree. Will be consistent with article meta
[x] Pagination styles?
[x] line-height of last line/"continue reading" is awkward?

**Story Roll**
[x] Genome icon, not clock, is next to Read Time. Can we swap?

**Universal**
[x] Does sidebar font size match UI? Seems larger?
    Corrected. Resampled font sizes from comp.

[] Will nav transition to thinner bar w/ social sharing icons on Featured Articles?
    Yes.

[x] Lets make BROWSE drop down same width as white area
    Yes.

- Should margin between main content & sidebar be increased?
    I feel like it's sufficient, but am open to suggestions.

[x] All buttons (except Explore) should be all caps, bold, sans. See comps.
    exception: feature
[x] Hover for all light blue buttons (except Explore) should be #7dc98d

**Footer**
- Can I tweak this? In hindsight, I see it's a bulky literal translation of the wireframe. No bueno.
    Of course! Feel free.
[x]  Footer copy hover color be #7dc98d

[x] We need to add a "Blog Stories" aside section on the Homepage. Please see Phase 1 v1 UI design files for reference. This should be placed ABOVE "Most Popular".

[x] "Latest Columns" section should be trimmed back to 3 entries.

[] For "full bleed" images on Home and Featured, can we apply the effects we discussed (https://medium.com/)? If you have changed your mind on how we should handle these sections, let me know!

[x] Perhaps for Subscribe drawer we style the button differently? See the green "Continue" button for example here: http://tympanus.net/Development/CreativeButtons/

[x] Did you catch the "Read More" hover for the homepage cover image? Let's talk if you have any questions.

* [02/20/2014]

== Responsive Layouts Finished ==
    Initial pass. Details/Notes to work through

    Article: Blog
        - Article Content to Full Bleed @768px
        - Moved social icons placement to match Article: Blog w/o Image

    Article: Blog w/o Photo
        - Adjusts to Full Bleed @768px

    Article: Column
        - Adjusts to Full Bleed @768px

    Article: Feature
        Heros adjusts to cols @1224
        Heros adjusts to center-align text @768
        Heros adjust height and font-size @768 (to prevent overflow)
        Article Content and Pull-Outs adjust to Full Bleed @768
        Article-Photo's adjust to center




== Resolved Issues ==

    [x] Photo Caption Cards
        A vulnerable point, even on desktops: pushed down if article header info is verbose. Research for a better solution.




* Added Navigation & Layout Elements [02/19/2014]

== Pages Finished ==

    [x] Story Roll (added read time)
    [x] Blog Roll (added comment counter)
    [x] Search Results (added search form)

== New Layout Elements ==

    [x] Navigation Large Menu Dropdown Layout Block
    [x] Subscribe Form Element
    [x] Search Form Element
    [x] Subscribe Door Layout Block
    [x] Pagination Element

== Resolved Issues ==

    [x] Subscribe Door conflict with fixed navigation (both fixed, switched animation technique from height to transform:translateY)
    [x] Media Popover is abrupt
    [x] blog_no_photo: Too much margin between article header and article copy

== Unresolved Issues ==

    [x] AddThis Social List: padding issue
    [x] Nav mega dropdown inner content 'bumps' slightly on hover
    [] Nav mega dropdown is abrupt (add hoverintent.js)
    [x] Media Popover social counter 'bumps' slightly on hover


[x] Implemented Redesign, Added Layout Elements [02/18/2014]

== Pages in Progress ==

    [x] Story Roll (add pagination)
    [x] Search Results (add search)

== New Layout Elements ==

    [x] Latest Column Author List
    [x] Media Object - Horiztonal
    [x] Popover for Media Object in Collection
    [x] Comment Counter for Media Objects




* Layout, Interactive [02/13/14]

== General ==

    [x] Swap Icons
    [x] CB Additions/Revisions
    [x] Feature Article Layout

== Featured Article (Layout Elements) ==

    _ Add Layout Elements (Article Typographic Elements)
        [x] Lead P (color, small caps)
        [x] Quotes
        [x] Quotes L,R
        [x] Inline Headers
    _ Add Layout Elements (Article Media Objects):
        [x] Full-bleed image with figcaption + button (hero layout)
        [x] Aside image with figcaption + button
        [x] Inline image with figcaption + button
        [x] Aside vid image + button
        [x] Article media object buttons:
            [x] view slideshow
            [x] watch video
            [x] view full image



* Heros [02/12/14]


* Home, Improved Layout Structure - [02/11/14]


* Basic Layout Elements, Layout Structure, Utility Classes - [02/04/14]














--------------------
* BACKLOG

== GENERAL ==

    _ Check typography & grid sizes


== HEADER ==

    _ Locks and Minifies

== Featured Article ==

    _ Overlay
        _ Single Image
        _ Image Gallery
        _ Video
    _ Inline Gallery

== Hover States ==

    _ collection media objects
        _ comment counter
        _ anything else?

    _ feature overlay
        _ Read this Feature prompt



