import { test, expect } from '@playwright/test';

test.describe('Client Submit Workflow', () => {
  const sessionUrl = '/proofing-session/test-session/?token=TESTTOKEN123';

  test.beforeEach(async ({ page }) => {
    await page.goto(sessionUrl);
  });

  test('submit disabled initially', async ({ page }) => {
    await expect(page.locator('.submit-btn')).toBeDisabled();
  });

  test('enabled after selection', async ({ page }) => {
    await page.keyboard.press('S'); // Select an image
    await expect(page.locator('.submit-btn')).toBeEnabled();
  });

  test('modal shows photos', async ({ page }) => {
    await page.keyboard.press('S');
    await page.locator('.submit-btn').click();
    await expect(page.locator('.submit-modal')).toBeVisible();
    await expect(page.locator('.submit-modal .selected-count')).toContainText('1');
  });

  test('confirm submission', async ({ page }) => {
    await page.keyboard.press('S');
    await page.locator('.submit-btn').click();
    await page.locator('.confirm-submit-btn').click();
    await expect(page.locator('.submitted-overlay')).toBeVisible();
  });

  test('session locked after', async ({ page }) => {
    // Assuming the backend persisted the submission state for this session in the previous test
    await page.goto(sessionUrl);
    await expect(page.locator('.submitted-overlay')).toBeVisible();
    await expect(page.locator('.focus-culler-mode')).not.toBeVisible();
  });
});
