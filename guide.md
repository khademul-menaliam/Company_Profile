# Admin Guide: Updating Home Page Content

The Home page displays various sections (Hero Sliders, History, Messages, Services, Projects, Clients, Partners) that are driven by the database. Most of the dynamic text-based sections are managed using the **Company Section** feature in the admin panel. 

Here is how you can update each section of the home page from the admin dashboard:

## 1. Hero Sliders
The Hero sliders on the home page use the `CompanySection` model.
- **Section Type:** Select or ensure the section is set as `hero_slider`.
- **Title:** The main bold text displayed on the slide.
- **Subtitle:** The text shown below the main title.
- **Content:** The link for the "Explore Services" button (e.g., `/services`).
- **Image:** Upload the background image for the slide.
- **Status:** Set to Active/True to display it.
- **Sort Order:** Determines the sequence of the slides.

## 2. Company History
The history section shown on the homepage is also managed via the `CompanySection` model.
- **Section Type:** `history`
- **Title:** The heading (e.g., "Our History").
- **Content:** The main descriptive text for the history (supports rich text/HTML).
- **Image:** The side image displayed next to the text.
- **Status:** Set to Active/True to display it on the home page.

## 3. Messages (CEO and Advisor)
The messages from the CEO and Advisor are managed via the `CompanySection` model.
- **Section Type:** `messages`
- **Type:** Use `ceo` for the CEO message and `advisor` for the Advisor message.
- **Title:** The main heading for the message box (e.g., "Message from CEO").
- **Subtitle:** The designation or secondary title (e.g., "CEO, AR Engineering").
- **Content:** The actual message text.
- **Image:** The profile picture of the person.
- **Status:** Set to Active/True.
- **Sort Order:** Determines which message comes first (e.g., 1 for CEO, 2 for Advisor).

## 4. Services
Services are managed under the **Services** module in the admin side.
- To display a service on the homepage, make sure its **Status** is active.
- Only top-level services (services without a parent) are fetched.
- The top 3 services based on `sort_order` are displayed.

## 5. Projects
Projects are managed under the **Projects** module.
- All projects with an active **Status** are fetched and displayed.

## 6. Clients & Partners
- **Clients:** Managed via the **Clients** module. Add a new client with a logo, and it will automatically appear in the sliding carousel.
- **Partners:** Managed via the **Partners** module. Active partners (up to 5) will be displayed.

---
### Running the Seeder
To populate the default initial data for Hero Sliders, History, and Messages, you can run the following command in your terminal:
```bash
php artisan db:seed --class=CompanySectionSeeder
```
