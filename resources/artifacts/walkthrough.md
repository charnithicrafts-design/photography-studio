# Chitramaya Photo Proofing - Full Walkthrough

Welcome to the Chitramaya Photo Proofing Plugin! This guide will walk you through the entire lifecycle of creating, managing, sharing, and completing a photo proofing session with your clients.

## 1. Setting Up a Proofing Session (Office Admin)

1. **Access the Office Dashboard**:
   - Log into your WordPress admin panel.
   - Click on **Proofing** in the left-hand menu. This takes you directly to the **Office Dashboard**, where you can see all your proofing sessions at a glance in a modern grid view.

2. **Create a New Session**:
   - Click **Add New** or **Add New Proofing Session**.
   - **Title**: Enter a descriptive name for the session (e.g., "Smith Family Wedding").
   - **Proofing Session Configuration** (Meta Box):
     - **Client Name**: Enter the client's name.
     - **Client Email**: Enter the client's email address.
     - **Access Code**: A random 8-character access code is generated automatically. You can customize this if you prefer.
     - **Quota**: Set the maximum number of photos the client is allowed to select (e.g., 30).
     - **Notifications**: Check the box to enable email notifications when the client submits their selection or requests a reselection.
   - **Publish**: Click Publish to save the session.

3. **Upload Photos**:
   - Scroll down to the **Session Photos (Drag & Drop)** meta box.
   - Drag and drop your photos into the dropzone, or click to select files.
   - The plugin supports bulk uploading. Progress bars will indicate the upload status of each file.
   - Note: To prevent duplicates, the plugin automatically sanitizes filenames.

4. **Share the Magic Link**:
   - After publishing, the **Magic Link** is generated in the configuration meta box.
   - Click on the link to copy it.
   - Send this link (which includes the access code) to your client.

---

## 2. Client Experience (The Proofing Interface)

1. **Accessing the Gallery**:
   - The client clicks the Magic Link and bypasses any login screens directly into their private proofing session.

2. **Culling Mode (Focus View)**:
   - The client is presented with a distraction-free, dark-themed "Focus Culler" view.
   - **Navigation**: They can use on-screen arrows, arrow keys on their keyboard, or swipe left/right on mobile devices.
   - **Actions**:
     - **Select (✓)**: Marks a photo as selected.
     - **Reject (✕)**: Marks a photo as rejected.
     - **Note (📝)**: Clients can leave specific editing notes on any photo (e.g., "Can you remove the blemish?").
   - **Keyboard Shortcuts**: `S` for Select, `R` for Reject, `U` for Undo.

3. **Grid Mode (Overview)**:
   - Clients can press `G` (or use the toggle switch) to view a Masonry grid of all photos.
   - They can filter the grid by "Selected", "Rejected", or "Unreviewed".
   - Double-clicking any photo in the grid opens it in Focus Mode.

4. **Quota and Progress**:
   - A visual **Quota Ring** tracks how many photos have been selected versus the package limit.
   - If they select more than the quota, they receive a gentle warning that extra charges may apply.
   - Progress is automatically saved in the background as they work.

5. **Submission**:
   - Once satisfied, the client clicks **Submit Selection**.
   - A modal summarizes their choices (e.g., "You've selected 32 photos (30 included). 2 additional photos will be charged separately.").
   - Upon confirmation, the session locks and they are shown a **Submitted Gallery View** displaying only their finalized selections.

---

## 3. Reselection & Workflow Modifications

1. **Client Reselection Request**:
   - If the client changes their mind after submitting, they can click **Request Reselection** on the Submitted Gallery screen.
   - The session unlocks automatically, returning them to Focus Mode.

2. **Admin Notifications**:
   - If notifications are enabled, the Office Admin receives an email whenever a client submits their gallery or requests a reselection.
   - The **Office Dashboard** will highlight the session with a badge:
     - `In Review` (Orange)
     - `Submitted` (Green)
     - `Reselection Requested` (Red)

3. **Exporting Selections to Lightroom**:
   - On the session edit screen, the **Lightroom Filter String** field automatically aggregates the exact filenames of the selected photos.
   - Click **Copy to Clipboard** and paste it into Lightroom's Text Search (Any Searchable Field > Contains All) to instantly isolate the client's chosen edits!

---

## 4. Running the Test Suite (Developers)

The plugin includes a full PHPUnit and Playwright E2E testing suite to ensure stability during future updates.

1. **Initialize the Environment**:
   ```bash
   cd wp-content/plugins/chitramaya-proofing
   bash bin/install-wp-tests.sh wordpress_test root '' localhost latest
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Run PHPUnit Tests**:
   ```bash
   ./vendor/bin/phpunit
   ```
   This executes 43 unit tests covering CPT Registration, API validation, AJAX Uploads, Meta Box Saving, and Template Overrides.

4. **Run E2E Browser Tests**:
   ```bash
   npm run test:e2e
   ```
   This tests the frontend client interactions (culling, gridding, submitting, and reselecting) in a headless Chromium browser.
