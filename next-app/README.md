# PMSWALA Next App

Single-project Next.js fullstack foundation for PMSWALA migration.

## Includes
- React frontend (`app/`)
- API routes (`app/api/`)
- Mongo connection utility (`lib/mongodb.ts`)
- Initial Mongoose models (`models/`)
- Migration script scaffold (`scripts/migrate/mysql-to-mongo.ts`)

## Implemented API surface
- Auth
	- `POST /api/auth/bootstrap-admin` (requires `x-bootstrap-secret`)
	- `POST /api/auth/login`
	- `POST /api/auth/reset-password`
	- `GET /api/auth/me`
	- `POST /api/auth/logout`
- Public
	- `GET /api/public/pages`
	- `GET /api/public/pages/[slug]`
	- `POST /api/public/contact`
	- `GET /api/public/portfolio`
- User
	- `GET /api/user/transactions?legacyUserId=...`
- Admin (requires admin auth cookie)
	- `GET /api/admin/users`
	- `GET/PATCH /api/admin/withdrawals`
	- `GET/POST /api/admin/pages`
	- `PATCH/DELETE /api/admin/pages/[id]`
	- `GET/POST /api/admin/portfolios`
	- `PATCH/DELETE /api/admin/portfolios/[id]`
	- `GET/PATCH /api/admin/transactions`
- Migration verification
	- `GET /api/migration/parity`
	- `GET /api/migration/run`
	- `POST /api/migration/run`
	- `GET /api/migration/mismatches`

## Implemented UI routes
- `/auth/login`
- `/auth/reset-password`
- `/admin`
- `/admin/users`
- `/admin/withdrawals`
- `/admin/pages`
- `/admin/portfolios`
- `/admin/transactions`
- `/admin/migration`
- `/user/dashboard`
- `/user/transactions`

## Quick start
1. Copy `.env.example` to `.env.local` and set values.
2. Install dependencies: `npm install`
3. Run dev server: `npm run dev`
4. Check health endpoint: `/api/health`

## Migration script
- Dry run: `npm run migrate:dry`
- Run mode: `npm run migrate:run`
