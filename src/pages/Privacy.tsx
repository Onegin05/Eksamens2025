
import React from "react";
import { Card, CardContent } from "@/components/ui/card";
import { Shield } from "lucide-react";

const Privacy = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-4xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <Shield className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Privātuma Politika</h1>
          <p className="text-lg text-gray-600">
            Pēdējo reizi atjaunināta: 2023. gada 1. maijā
          </p>
        </div>

        <Card className="mb-8">
          <CardContent className="p-8">
            <div className="prose prose-green max-w-none">
              <h2 className="text-2xl font-bold mb-4">1. Ievads</h2>
              <p className="mb-4">
                ZaļāAugsme ("mēs", "mūsu" vai "uzņēmums") apņemas aizsargāt jūsu privātumu. Šī privātuma politika izskaidro, kādus datus mēs vācam, kā mēs tos izmantojam un kādas ir jūsu tiesības attiecībā uz jūsu personīgo informāciju.
              </p>
              <p>
                Izmantojot mūsu vietni un pakalpojumus, jūs piekrītat datu vākšanai un izmantošanai saskaņā ar šo politiku. Ja jums ir kādi jautājumi vai bažas, lūdzu, sazinieties ar mums, izmantojot kontaktinformāciju, kas norādīta šīs politikas beigās.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">2. Informācija, ko mēs vācam</h2>
              <p className="mb-4">Mēs varam vākt šādu personīgo informāciju:</p>
              <ul className="list-disc pl-5 mb-4 space-y-2">
                <li>
                  <strong>Kontaktinformācija</strong> - Vārds, e-pasta adrese, tālruņa numurs, pasta adrese.
                </li>
                <li>
                  <strong>Profila informācija</strong> - Lietotājvārds, parole, profila preferences.
                </li>
                <li>
                  <strong>Finanšu informācija</strong> - Finanšu dati, ko jūs ievadāt mūsu kalkulatoros un rīkos (piezīme: mēs neuzglabājam jūsu bankas vai maksājumu karšu datus).
                </li>
                <li>
                  <strong>Lietošanas dati</strong> - Informācija par to, kā jūs lietojat mūsu vietni un pakalpojumus.
                </li>
                <li>
                  <strong>Tehniskā informācija</strong> - IP adrese, pārlūkprogrammas veids un versija, laika josla, operētājsistēma un platforma.
                </li>
              </ul>

              <h2 className="text-2xl font-bold mt-8 mb-4">3. Kā mēs izmantojam jūsu informāciju</h2>
              <p className="mb-4">Mēs izmantojam jūsu personīgo informāciju, lai:</p>
              <ul className="list-disc pl-5 mb-4 space-y-2">
                <li>Nodrošinātu un uzlabotu mūsu pakalpojumus</li>
                <li>Pārvaldītu jūsu kontu</li>
                <li>Nosūtītu jums pakalpojumu atjauninājumus</li>
                <li>Personalizētu jūsu pieredzi</li>
                <li>Analizētu un uzlabotu mūsu vietni un pakalpojumus</li>
                <li>Atbildētu uz jūsu jautājumiem un pieprasījumiem</li>
                <li>Nosūtītu jums mārketinga un reklāmas materiālus (ja jūs tam piekrītat)</li>
                <li>Aizsargātu mūsu tiesības un intereses</li>
              </ul>

              <h2 className="text-2xl font-bold mt-8 mb-4">4. Sīkdatnes un līdzīgas tehnoloģijas</h2>
              <p className="mb-4">
                Mēs izmantojam sīkdatnes un līdzīgas izsekošanas tehnoloģijas, lai izsekotu aktivitāti mūsu vietnē un saglabātu noteiktu informāciju. Sīkdatnes ir faili ar nelielu datu daudzumu, kas var ietvert anonīmu unikālu identifikatoru. Tās tiek nosūtītas uz jūsu pārlūkprogrammu no vietnes un tiek saglabātas jūsu ierīcē.
              </p>
              <p>
                Jūs varat norādīt savai pārlūkprogrammai atteikties no visām sīkdatnēm vai norādīt, kad sīkdatne tiek nosūtīta. Tomēr, ja jūs nepieņemat sīkdatnes, iespējams, ka nevarēsiet izmantot dažas mūsu vietnes daļas.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">5. Datu glabāšana</h2>
              <p className="mb-4">
                Mēs saglabāsim jūsu personīgo informāciju tikai tik ilgi, cik nepieciešams šajā privātuma politikā izklāstītajiem mērķiem, ja vien likums neprasa vai neatļauj ilgāku saglabāšanas periodu.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">6. Datu drošība</h2>
              <p className="mb-4">
                Mēs izmantojam atbilstošus datu vākšanas, uzglabāšanas un apstrādes prakses un drošības pasākumus, lai aizsargātu pret neatļautu piekļuvi, pārveidošanu, izpaušanu vai jūsu personīgās informācijas, lietotājvārda, paroles, darījumu informācijas un mūsu serverī uzglabāto datu iznīcināšanu.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">7. Jūsu tiesības</h2>
              <p className="mb-4">Jums ir šādas tiesības attiecībā uz saviem datiem:</p>
              <ul className="list-disc pl-5 mb-4 space-y-2">
                <li>Tiesības piekļūt savai personīgajai informācijai</li>
                <li>Tiesības labot vai atjaunināt savu personīgo informāciju</li>
                <li>Tiesības dzēst savu personīgo informāciju</li>
                <li>Tiesības ierobežot vai iebilst pret apstrādi</li>
                <li>Tiesības uz datu pārnesamību</li>
                <li>Tiesības atcelt piekrišanu</li>
              </ul>
              <p>
                Lai īstenotu jebkuru no šīm tiesībām, lūdzu, sazinieties ar mums, izmantojot kontaktinformāciju, kas norādīta zemāk.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">8. Izmaiņas privātuma politikā</h2>
              <p className="mb-4">
                Mēs varam atjaunināt šo privātuma politiku ik pa laikam. Mēs jūs informēsim par jebkādām izmaiņām, publicējot jauno privātuma politiku šajā lapā un atjauninot "pēdējo reizi atjaunināta" datumu.
              </p>
              <p>
                Mēs iesakām periodiski pārbaudīt šo privātuma politiku, lai būtu informēts par izmaiņām. Izmaiņas šajā privātuma politikā stājas spēkā, kad tās tiek publicētas šajā lapā.
              </p>

              <h2 className="text-2xl font-bold mt-8 mb-4">9. Sazinieties ar mums</h2>
              <p className="mb-4">
                Ja jums ir kādi jautājumi vai ierosinājumi par mūsu privātuma politiku, lūdzu, sazinieties ar mums:
              </p>
              <div className="mb-4">
                <p>ZaļāAugsme</p>
                <p>E-pasts: privacy@zalaugusme.lv</p>
                <p>Tālrunis: +371 29 123 456</p>
                <p>Adrese: Brīvības iela 123, Rīga, LV-1010, Latvija</p>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  );
};

export default Privacy;
