import { test, expect } from '@playwright/test';

test.describe('Client Culler Interface', () => {
  // Using a mock URL; ensure this matches the created session slug in a real run
  const sessionUrl = '/proofing-session/test-session/';
  const validToken = 'TESTTOKEN123';

  test('access with invalid token', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=INVALID`);
    await expect(page.locator('.access-code-form')).toBeVisible();
    await expect(page.getByText('Invalid token')).toBeVisible();
  });

  test('access with valid token', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    await expect(page.locator('.focus-culler-mode')).toBeVisible();
  });

  test('select via S key', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    await page.keyboard.press('S');
    await expect(page.locator('.status-badge.selected').first()).toBeVisible();
  });

  test('reject via R key', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    await page.keyboard.press('R');
    await expect(page.locator('.status-badge.rejected').first()).toBeVisible();
  });

  test('undo via U key', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    await page.keyboard.press('S');
    await expect(page.locator('.status-badge.selected').first()).toBeVisible();
    await page.keyboard.press('U');
    await expect(page.locator('.status-badge.selected').first()).not.toBeVisible();
  });

  test('arrow navigation', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    const firstImgSrc = await page.getAttribute('.stage-image', 'src');
    await page.keyboard.press('ArrowRight');
    const secondImgSrc = await page.getAttribute('.stage-image', 'src');
    expect(firstImgSrc).not.toBe(secondImgSrc);
  });

  test('filmstrip click', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    const thumb = page.locator('.filmstrip .thumb').nth(2);
    await thumb.click();
    await expect(thumb).toHaveClass(/active/);
  });

  test('note persistence', async ({ page }) => {
    await page.goto(`${sessionUrl}?token=${validToken}`);
    await page.fill('.action-cards .note-input', 'Retouch hair');
    await page.keyboard.press('Tab'); // Trigger blur/save
    await page.reload();
    await expect(page.locator('.action-cards .note-input')).toHaveValue('Retouch hair');
  });
});
