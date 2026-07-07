# Individual Page Generation Prompts: AR Engineering

Use the following prompts individually with your AI generator (such as Google Stitch) to build or redesign each page of the application while maintaining perfect visual consistency with the design system.

---

## Page 1: Home Page

```text
Create a premium, modern Home Page layout for AR Engineering matching the company's industrial design language.
The page must include the following structural sections:
1. Hero Slider (Alpine.js integration):
   - Full height header section: `h-[80vh] min-h-[500px] relative overflow-hidden bg-slate-900`.
   - Backdrop image with dark overlay: `absolute inset-0 bg-black/40 bg-cover bg-center`.
   - Title: `text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 uppercase tracking-wide drop-shadow-md`.
   - Subtitle: `text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto`.
   - Call-To-Action Button: Centered rounded pill shape button `bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 font-semibold transition duration-300 shadow-md scale-[1.02]`.
   - Dots Controls: Row of absolute positioned small clickable indicator dots at the bottom.
2. About Us Introduction Section:
   - Layout: Two-column grid `flex flex-col md:flex-row items-center gap-8 py-12 px-4 max-w-6xl mx-auto`.
   - Image Panel (Left): `md:w-1/2 rounded-xl shadow-lg border border-gray-100 overflow-hidden w-full h-80 object-cover`.
   - Text Panel (Right): `md:w-1/2 text-left`.
     - Heading: `text-3xl font-bold mb-4 text-gray-900 uppercase tracking-wide`. Include a blue accent line at the bottom.
     - Paragraph: Leading relaxed text using `text-gray-700 text-lg leading-relaxed text-justify`.
3. CEO & Advisor Message Section:
   - Layout: Light gray container `bg-gray-50 py-12 px-4`. Inner container: `max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12`.
   - Message Cards (CEO & Advisor): `bg-white p-8 rounded-xl shadow-md border-t-2 border-indigo-500 text-center flex flex-col items-center justify-between`.
     - Avatar: `w-32 h-32 rounded-full mb-4 object-cover border-2 border-indigo-100 shadow-sm`.
     - Message Quote: `text-gray-600 italic text-base mb-4 leading-relaxed` wrapped inside quotes.
     - Signature/Title: Name in `font-bold text-gray-900 text-lg` and designation in `text-sm text-indigo-600 font-medium`.
4. Services Highlight Grid:
   - Layout: Centered page section with title `Our Services` (`text-3xl font-bold mb-10 text-center text-gray-900 uppercase tracking-wide`).
   - Cards Grid: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 max-w-6xl mx-auto px-4`.
   - Service Card: `bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col h-full justify-between border border-gray-100`.
     - Image: Container `relative overflow-hidden rounded-lg mb-4`. Image `w-full h-40 object-cover transform hover:scale-105 transition-transform duration-500`.
     - Card Title: `font-semibold text-xl mb-2 text-gray-800`.
     - Bullet points list: `text-gray-600 text-sm mb-4 list-disc list-inside space-y-1 text-left mx-auto w-fit pl-4`.
     - Link Button: `text-indigo-600 font-semibold hover:underline mt-auto inline-block`.
```

---

## Page 2: About Us Page

```text
Create a corporate About Us Page for AR Engineering emphasizing technical precision and capabilities.
The page must include the following structural sections:
1. Hero Header Banner:
   - Section: `relative bg-cover bg-center h-[50vh] min-h-[350px]` with dark slate background-overlay `absolute inset-0 bg-slate-900/75`.
   - Accent Lines: Industrial accent border bar at the top and bottom: `w-full h-1.5 bg-indigo-600`.
   - Center Badge: `text-indigo-400 font-bold tracking-[0.2em] uppercase text-xs mb-3 border border-indigo-500/50 px-4 py-1.5 rounded-full bg-slate-900/50`.
   - Title: `text-4xl md:text-5xl font-extrabold text-white text-center drop-shadow-lg tracking-tight uppercase`.
2. Detailed History Narrative Section:
   - Layout: Centered content box `container mx-auto px-4 max-w-5xl py-16`.
   - Narrative Card: `bg-white border-l-4 border-indigo-600 p-8 md:p-12 shadow-md rounded-r-xl`.
   - Content styling: Typography uses Figtree `text-gray-700 text-lg leading-relaxed text-justify [&_p]:mb-4 [&_ul]:list-disc [&_ul]:list-inside [&_ul]:space-y-1`.
3. Strategic Pillars (Mission, Vision, Values, Quality Policy):
   - Layout: Gray background container `bg-gray-50 py-16`. Grid layout `grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto px-4`.
   - Strategic Cards: Recreate the dynamic expanding border effect. Card style is `pillar-card bg-white shadow-sm p-8 rounded-2xl border-2 border-gray-100 hover:bg-blue-50/50 transition-colors duration-300 relative overflow-hidden z-10`.
     - Heading Area: SVG icon (`w-8 h-8 text-indigo-600`) positioned next to the title `text-2xl font-bold text-gray-900 uppercase tracking-wide`.
     - Inner Content: `text-gray-600 leading-relaxed text-base [&_ul]:list-disc [&_ul]:list-inside`.
     - Underline Highlight: `h-1 w-16 bg-indigo-600 mt-4`.
```

---

## Page 3: Services Listings & Detail Pages

```text
Create a two-in-one prompt design for (A) Services Listing Page and (B) Service Detail Page of AR Engineering.
(A) Services Listing Layout:
   - Section: Centered header area: `py-12 bg-gray-50 text-center`. Section title: `text-4xl font-extrabold text-gray-900 mb-2 uppercase tracking-wide`.
   - Grid layout: `grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-4 py-8`.
   - Service Cards: `bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col justify-between`.
     - Header: A bold SVG icon representing the service category.
     - Title: `text-xl font-bold text-gray-800 mb-3`.
     - Brief: `text-sm text-gray-600 leading-relaxed mb-4`.
     - Link button: `text-indigo-600 font-bold hover:text-indigo-800 flex items-center gap-1`.

(B) Service Detail Page Layout:
   - Structure: Two-column grid layout `grid grid-cols-1 lg:grid-cols-12 gap-8 max-w-6xl mx-auto px-4 py-12`.
   - Main Content Panel (8 Columns): `lg:col-span-8 bg-white p-8 rounded-xl shadow-sm`.
     - Main heading: `text-3xl font-bold text-indigo-700 mb-4`.
     - Rich content styling: Figtree font, standard `text-gray-700 text-lg leading-relaxed text-justify [&_h3]:text-xl [&_h3]:font-bold [&_h3]:mt-6 [&_h3]:mb-3 [&_ul]:list-disc [&_ul]:pl-5 [&_p]:mb-4`.
     - Media banner: Big inline banner image `w-full h-80 object-cover rounded-xl shadow-sm mb-6`.
   - Sidebar Info Panel (4 Columns): `lg:col-span-4 space-y-6`.
     - Quick Links Widget: `bg-indigo-50/50 p-6 rounded-xl border border-indigo-100/50`. Includes a title and lists links to other services (`block py-2.5 px-4 text-sm font-semibold rounded-lg bg-white border hover:bg-indigo-600 hover:text-white transition duration-300`).
     - Contact CTA Widget: Centered card `bg-slate-900 text-white p-6 rounded-xl text-center shadow-lg`. Action button: `w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-bold text-xs uppercase tracking-wider`.
```

---

## Page 4: Projects Listing & Detail Pages

```text
Create a project showcase layout consisting of (A) Project Grid Listing and (B) Project Case Study Detail Page.
(A) Project Listings Grid:
   - Header Section: Centered header with categories filtering. Section title: `text-4xl font-extrabold text-indigo-900 mb-2 text-center uppercase`.
   - Category filter tabs: Row of buttons (`px-5 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 border hover:bg-indigo-600 hover:text-white transition-all`). Active button uses `bg-indigo-600 text-white`.
   - Grid layout: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4 py-8`.
   - Project Card: `bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between border border-gray-100`.
     - Media: `relative overflow-hidden h-52`. Image scales on hover: `w-full h-full object-cover transform hover:scale-105 transition-duration-500`. Absolute badge overlay `absolute top-3 left-3 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase`.
     - Body: `p-6 flex-grow`. Title: `font-bold text-lg text-gray-900 mb-2`. Timeline & location: `text-xs text-gray-500 mb-3`. Snippet text: `text-sm text-gray-600 line-clamp-3`.
     - Footer: `p-6 pt-0 border-t border-gray-50 mt-auto`. Action button: `text-indigo-600 hover:text-indigo-800 font-bold text-sm inline-flex items-center gap-1`.

(B) Project Case Study Detail Layout:
   - Banner: High-impact banner header with overlay text: `h-[60vh] min-h-[400px] relative bg-cover bg-center flex items-end`. Dark overlay: `absolute inset-0 bg-slate-900/60`. Text block: `relative max-w-4xl mx-auto px-4 pb-12 w-full text-white`. Title: `text-4xl md:text-5xl font-extrabold uppercase`.
   - Meta Specs Row: Inset details card floating under banner: `bg-white rounded-xl shadow-md p-6 max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 -mt-8 relative z-10 border border-gray-100`. Column content: label in `text-xs text-gray-400 font-bold uppercase` and value in `text-sm font-bold text-gray-800`.
   - Split Columns Layout: `grid grid-cols-1 lg:grid-cols-12 gap-10 max-w-5xl mx-auto px-4 py-12`.
     - Narrative Section (8 columns): Case study sections (Challenge, Solution, Results) styled as card blocks `bg-white p-8 rounded-xl shadow-sm border border-gray-100 prose max-w-none text-gray-700`.
     - Gallery Widget (4 columns): Project images arranged as a grid of thumbs with lightbox integrations.
```

---

## Page 5: Careers Listings & Apply Pages

```text
Create a complete job portal UI containing (A) Job Vacancies Listing and (B) Application Form page.
(A) Careers Listings Layout:
   - Header area: Centered titles `text-4xl font-extrabold text-indigo-900 text-center mb-2`. Subtitle: `text-center text-gray-500 mb-12`.
   - Grid layout: Centered flexbox or grid stack `flex flex-wrap justify-center gap-8 max-w-6xl mx-auto px-4`.
   - Card Component: `bg-indigo-50 border-l-4 border-indigo-500 rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between w-full md:max-w-[420px]`.
     - Card Header: Flex row layout containing title `font-bold text-xl text-indigo-900 leading-tight` and right badge `text-xs font-bold bg-indigo-600 text-white px-3 py-1 rounded-full uppercase tracking-wider whitespace-nowrap ml-2`.
     - Details layout: Location `text-sm text-indigo-700 font-medium italic flex items-center gap-2 mb-2` and Deadline date `text-xs text-gray-500 flex items-center gap-2`.
     - Snippet text: `text-gray-700 mb-6 leading-relaxed text-sm`.
     - Link footer: `inline-flex items-center text-indigo-700 font-bold hover:text-indigo-900 transition-colors group border-t border-indigo-100 pt-4 mt-auto w-full` containing action text with sliding arrow animation on hover.

(B) Job Application Layout:
   - Page Structure: Centered column `container mx-auto max-w-4xl px-4 py-12 bg-gray-50`.
   - Form Container Card: `bg-white p-8 rounded-xl shadow-md border-t-4 border-indigo-600`.
   - Header inside card: Title `text-2xl font-bold mb-6 text-gray-900`.
   - Validation States:
     - Global success banner: `bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200 text-sm font-medium`.
     - Global error validation list box: `bg-red-100 text-red-700 p-4 mb-6 rounded-lg border border-red-200 text-sm font-medium`.
   - Field structures (2-column grids): `grid md:grid-cols-2 gap-6 mb-4`.
     - Label: `block text-sm font-semibold mb-1 text-gray-700`.
     - Inputs: `w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none border-gray-300`.
     - File upload widget: File input styled with custom upload elements: `w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100`.
   - Submit Button: `w-full bg-indigo-600 text-white font-bold py-3.5 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-lg text-center uppercase tracking-wider text-xs`.
```

---

## Page 6: Contact Us Page

```text
Create a corporate Contact Us Page layout matching the AR Engineering theme.
The screen should be divided into a split-pane layout:
1. Outer Page Header:
   - Heading: `text-4xl md:text-5xl font-bold text-center text-gray-900 mb-12 uppercase tracking-wide`. Highlighting `AR Engineering` in `text-indigo-600`.
2. Main Content Wrapper:
   - Layout: Centered page wrapper `container mx-auto max-w-7xl px-6 py-6 md:py-10 grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-stretch`.
3. Left Pane - Contact Form Card:
   - Card Style: `bg-white shadow-xl rounded-2xl border-2 border-gray-400 p-6 sm:p-8 lg:p-10 flex flex-col h-full hover:border-gray-700 hover:shadow-slate-900/40 hover:-translate-y-2 transition-all duration-300`.
   - Card Title: `text-2xl font-bold mb-6 text-gray-900 uppercase tracking-wide`.
   - Fields stack: `space-y-5`.
   - Inputs (Name, Email, Textarea): Bordered with a thick outline focus styled custom classes: `w-full border-2 border-gray-400 rounded-xl p-3 focus:border-orange-600 focus:ring-0 transition-all duration-300`.
   - Submit Button: `w-full bg-sky-700 text-white font-bold uppercase tracking-wider py-3.5 rounded-xl hover:bg-sky-800 transition duration-300 shadow-md`.
4. Right Pane - Information & Map Card:
   - Card Style: `bg-sky-50 text-gray-800 shadow-xl rounded-2xl border-2 border-gray-400 p-6 sm:p-8 lg:p-10 flex flex-col h-full hover:border-gray-700 hover:shadow-slate-900/40 hover:-translate-y-2 transition-all duration-300`.
   - Details list: Vertical list of contact details using Font Awesome icons highlighted in orange color: `w-6 h-6 text-orange-500 mr-4`. Text elements: Labels in `text-sky-900 font-bold`.
   - Map Frame: Inline iframe block mounted at the bottom of the card: `rounded-lg overflow-hidden border border-sky-200 h-64 md:h-72 shadow-sm`.
```

---

## Page 7: Client Page

```text
Create a corporate Client Logo Showroom & Testimonials layout for AR Engineering.
The design should consist of three core sections:
1. Header Section:
   - Centered page header title: `text-4xl font-extrabold text-gray-900 mb-2 uppercase text-center`. Subtitle describing the clients network: `text-gray-500 text-center mb-12`.
2. Clients logo Grid:
   - Grid layout: `grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 max-w-6xl mx-auto px-4 py-6`.
   - Logo Container: `bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-center h-28 hover:shadow-md hover:border-indigo-200 hover:-translate-y-1 transition-all duration-300`.
   - Logo Image: Grayed logo using Tailwind grayscale classes `w-full h-full object-contain filter grayscale hover:grayscale-0 transition duration-300`.
3. Client Testimonials Section:
   - Layout: Gray background container `bg-gray-50 py-16 px-4`. Title: `text-3xl font-bold text-center mb-10 text-gray-900 uppercase`.
   - Carousel or grid layout: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto`.
   - Testimonial card: `bg-white rounded-xl shadow-md p-8 border border-gray-100 flex flex-col justify-between h-full relative`. Includes a quotation mark icon at the top corner.
     - Quote content: `text-gray-600 italic text-base leading-relaxed mb-6` wrapped inside quotes.
     - Profile details: Flex row footer containing avatar image `w-12 h-12 rounded-full object-cover mr-4 border`, name `font-bold text-gray-900 text-sm`, and company designation `text-xs text-indigo-600 font-medium`.
```

---

## Page 8: Gallery Page

```text
Create a showcase Photo & Video Gallery Layout for AR Engineering.
The layout must include:
1. Filter Navigation Header:
   - Page Header: Centered page title `text-4xl font-extrabold text-gray-900 mb-2 text-center uppercase`.
   - Filter Tabs: Row of tabs to switch between Categories and media type (Photos / Videos) using pill shapes: `px-5 py-2 text-sm font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:bg-indigo-600 hover:text-white transition duration-300`.
2. Photos Gallery Grid:
   - Grid layout: `grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto px-4 py-8`.
   - Photo Card: `relative overflow-hidden rounded-xl group shadow-sm bg-white border border-gray-100 aspect-square cursor-pointer`.
     - Image: `w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500`.
     - Overlay details on hover: Absolute overlay appearing on hover: `absolute inset-0 bg-slate-900/60 flex flex-col justify-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300`. Title: `text-white font-bold text-sm`. Category: `text-indigo-400 text-xs uppercase font-semibold`.
3. Videos Showcase Grid:
   - Grid layout: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4 py-8`.
   - Video Card: `bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 flex flex-col justify-between h-full hover:shadow-lg transition`.
     - Media player container: `relative aspect-video bg-black flex items-center justify-center`. Play icon overlay: absolute round play button overlaying center.
     - Details area: `p-5`. Video Title: `font-semibold text-gray-800 text-base mb-1`. Description: `text-xs text-gray-500`.
```
