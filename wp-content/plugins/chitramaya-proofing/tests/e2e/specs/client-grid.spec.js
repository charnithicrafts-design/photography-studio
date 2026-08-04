import { test, expect } from '@playwright/test';

test.describe('Client Grid Interface', () => {
  const sessionUrl = '/proofing-session/test-session/?token=TESTTOKEN123';

  test.beforeEach(async ({ page }) => {
    await page.goto(sessionUrl);
  });

  test('switch to grid via G', async ({ page }) => {
    await page.keyboard.press('G');
    await expect(page.locator('.grid-mode')).toBeVisible();
  });

  test('filter tabs with counts', async ({ page }) => {
    await page.keyboard.press('G');
    const filterTabs = page.locator('.filter-tabs .tab');
    await expect(filterTabs).toHaveCount(4); // e.g., All, Selected, Rejected, Unmarked
    await expect(filterTabs.first()).toContainText('All');
  });

  test('click-to-cycle status', async ({ page }) => {
    await page.keyboard.press('G');
    const firstItem = page.locator('.masonry-grid .grid-item').first();
    await firstItem.locator('.status-toggle-btn').click();
    await expect(firstItem).toHaveClass(/status-selected/);
    await firstItem.locator('.status-toggle-btn').click();
    await expect(firstItem).toHaveClass(/status-rejected/);
  });

  test('double-click opens culler', async ({ page }) => {
    await page.keyboard.press('G');
    const firstItem = page.locator('.masonry-grid .grid-item').first();
    await firstItem.dblclick();
    await expect(page.locator('.focus-culler-mode')).toBeVisible();
  });
});
