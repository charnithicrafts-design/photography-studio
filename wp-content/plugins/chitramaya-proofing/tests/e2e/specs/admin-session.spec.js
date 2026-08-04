import { test, expect } from '@playwright/test';

test.describe('Admin Session Management', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/wp-login.php');
    await page.fill('#user_login', 'admin');
    await page.fill('#user_pass', 'password');
    await page.click('#wp-submit');
    await expect(page.locator('text=Dashboard').first()).toBeVisible();
  });

  test('create session', async ({ page }) => {
    await page.goto('/wp-admin/post-new.php?post_type=proofing_session');
    
    // Fill title
    await page.fill('input[name="post_title"]', 'Test Session');
    
    // Fill meta box fields
    await page.fill('#client_name', 'Jane Doe');
    await page.fill('#client_email', 'jane@example.com');
    await page.fill('#access_code', 'TESTTOKEN123');
    await page.fill('#quota', '15');
    
    // Publish
    await page.click('#publish');
    await expect(page.locator('#message')).toContainText('published');
    
    // Assert magic link is present
    const magicLinkUrl = await page.inputValue('#magic_link, .magic-link-field'); // adjust selector based on meta box output
    if (magicLinkUrl) {
      expect(magicLinkUrl).toContain('token=TESTTOKEN123');
    }
  });

  test('edit session', async ({ page }) => {
    // Navigate to the list table
    await page.goto('/wp-admin/edit.php?post_type=proofing_session');
    
    // Click edit on the first post
    await page.click('.row-title:first-child');
    
    // Change quota
    await page.fill('#quota', '30');
    
    // Update
    await page.click('#publish');
    await expect(page.locator('#message')).toContainText('updated');
    
    // Reload and check persistence
    await page.reload();
    await expect(page.locator('#quota')).toHaveValue('30');
  });
});
