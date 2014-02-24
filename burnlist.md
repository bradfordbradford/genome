----
Burnlist: notes, mini bugs, etc
----



Add Utilities:
align-middle

background-white

background-neutral

# Stress Points

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



# Other Issues
[ ] Addthis clickable?
[ ] Video Overlay lags mfp-background
[ ] Subtle Site Loader: along bottom?







# Working through Mobile
- Aside Bar
    How to to handle this content?
    Idea #1: Collapse content aside blocks just like 'Print Edition'? Possible place bookmark btn with mobile specific nav (unnecessary, I think).

- Collections
    Where to break to Single Col? Stress point: @760px

- Social
    Q: These show up AFTER reading the article. Is that desirable? Moving them would require code duplication (mobile+desktop).

    A: Moved to top to match Blog w/o Photo for drier code, consistency, accesibility.
