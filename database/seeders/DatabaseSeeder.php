<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HomeSection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PlanSeeder::class,
            RoleSeeder::class,
            MerchantSeeder::class,
            MerchantCategorySeeder::class,
            MerchantSubCategorySeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            OfferTypeSeeder::class,
            OfferSeeder::class,
            UserOfferSeeder::class,
            CustomerFeedbackSeeder::class,
            NewsroomSeeder::class,
            PaymentReceivedSeeder::class,
            FaqsSeeder::class,
            CountrySeeder::class,
            HomeSectionSeeder::class,
            TermsSeeder::class,
            PrivacyPolicySeeder::class,
            RulesOfUseSeeder::class,
            ContactUsSeeder::class,
            MediaAssetsAlbumsSeeder::class,
            MediaAssetsImagesSeeder::class,
            AboutUsSeeder::class,
            ReturnPolicySeeder::class,
            BranchSeeder::class,
        ]);
    }
}
