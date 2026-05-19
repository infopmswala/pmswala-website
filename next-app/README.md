# PMSWALA Next App

Single-project Next.js fullstack foundation for PMSWALA migration.

## Includes
- React frontend (`app/`)
- API routes (`app/api/`)
- Mongo connection utility (`lib/mongodb.ts`)
- Initial Mongoose models (`models/`)
- Migration script scaffold (`scripts/migrate/mysql-to-mongo.ts`)

## Quick start
1. Copy `.env.example` to `.env.local` and set values.
2. Install dependencies: `npm install`
3. Run dev server: `npm run dev`
4. Check health endpoint: `/api/health`

## Migration script
- Dry run: `npm run migrate:dry`
- Run mode: `npm run migrate:run`
