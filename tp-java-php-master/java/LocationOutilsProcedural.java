import java.util.Scanner;

public class LocationOutilsProcedural {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);


        String[] nomsOutils = {
                "Perceuse",
                "Ponceuse",
                "Tondeuse",
                "Marteau piqueur",
                "Echelle"
        };
        double[] prixParJour = {
                15.0,
                12.5,
                25.0,
                40.0,
                10.0
        };
        boolean[] disponible = {
                true,
                true,
                true,
                true,
                true
        };

        boolean quitter = false;

        while (!quitter) {
            System.out.println("=====================================");
            System.out.println("   Mini systeme de location d'outils ");
            System.out.println("=====================================");
            System.out.println("1. Lister les outils");
            System.out.println("2. Louer un outil");
            System.out.println("3. Retourner un outil");
            System.out.println("4. Quitter");
            System.out.print("Votre choix : ");

            String ligne = scanner.nextLine();
            int choix;
            try {
                choix = Integer.parseInt(ligne);
            } catch (NumberFormatException e) {
                System.out.println("Choix invalide.");
                continue;
            }

            if (choix == 1) {
                System.out.println("\nListe des outils :");
                for (int i = 0; i < nomsOutils.length; i++) {
                    System.out.println(i + " - " + nomsOutils[i]
                            + " | " + prixParJour[i] + " €/jour"
                            + " | " + (disponible[i] ? "DISPONIBLE" : "LOUE"));
                }
                System.out.println();

            } else if (choix == 2) {
                System.out.print("\nEntrez l'index de l'outil a louer : ");
                String indexStr = scanner.nextLine();
                int index;
                try {
                    index = Integer.parseInt(indexStr);
                } catch (NumberFormatException e) {
                    System.out.println("Index invalide.\n");
                    continue;
                }

                if (index < 0 || index >= nomsOutils.length) {
                    System.out.println("Aucun outil pour cet index.\n");
                    continue;
                }

                if (!disponible[index]) {
                    System.out.println("Outil deja loue. Impossible de le louer a nouveau.\n");
                    continue;
                }

                System.out.print("Nombre de jours de location : ");
                String joursStr = scanner.nextLine();
                int nbJours;
                try {
                    nbJours = Integer.parseInt(joursStr);
                } catch (NumberFormatException e) {
                    System.out.println("Nombre de jours invalide.\n");
                    continue;
                }

                if (nbJours <= 0) {
                    System.out.println("Le nombre de jours doit etre strictement positif.\n");
                    continue;
                }

                double prixTotal = nbJours * prixParJour[index];
                disponible[index] = false;

                System.out.println("\n---------- Recapitulatif ----------");
                System.out.println("Outil : " + nomsOutils[index]);
                System.out.println("Duree : " + nbJours + " jour(s)");
                System.out.println("Prix par jour : " + prixParJour[index] + " €");
                System.out.println("Prix total : " + prixTotal + " €");
                System.out.println("-----------------------------------\n");

            } else if (choix == 3) {
                System.out.print("\nEntrez l'index de l'outil a retourner : ");
                String indexStr = scanner.nextLine();
                int index;
                try {
                    index = Integer.parseInt(indexStr);
                } catch (NumberFormatException e) {
                    System.out.println("Index invalide.\n");
                    continue;
                }

                if (index < 0 || index >= nomsOutils.length) {
                    System.out.println("Aucun outil pour cet index.\n");
                    continue;
                }

                if (disponible[index]) {
                    System.out.println("Cet outil est deja marque comme disponible.\n");
                    continue;
                }

                disponible[index] = true;
                System.out.println("Outil " + nomsOutils[index] + " retourne. Il est maintenant disponible.\n");

            } else if (choix == 4) {
                quitter = true;
                System.out.println("Au revoir !");
            } else {
                System.out.println("Choix invalide.\n");
            }
        }

        scanner.close();
    }
}
