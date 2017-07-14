import java.io.File;
import java.util.Scanner;

public class Main {

	static String regularExpression[];
	static String strings[];

	public static void main(String[] args) {
		// String pattern1="a(bc)*de";
		// // String pattern1="v(ab)*cs";
		// String pattern2="a(bc)+de";
		// String pattern3="a(bc)?de";
		// String pattern4="[a-m]*";
		// String pattern5="[^aeiou]";
		// String pattern6="[^aeiou]{6}";
		//
		//
		//
		// String string1="rhythms";
		//
		// boolean pattern1Result=string1.matches(pattern6);
		// System.out.println(pattern1Result);

		try {
			File f = new File("input1");
			Scanner k = new Scanner(f);
			while (k.hasNextLine()) {
				int totalRE = Integer.parseInt(k.nextLine().toString());
				regularExpression = new String[totalRE];
				int count = 1;
				while (count <= totalRE) {
					regularExpression[count - 1] = k.nextLine().toString();
					count++;
				}
				count = 1;
				int totalString = Integer.parseInt(k.nextLine().toString());
				strings = new String[totalString];
				while (count <= totalString) {
					strings[count - 1] = k.nextLine().toString();
					count++;
				}

			}
//			System.out.println("Regular Expression: ");
//			for (int c = 0; c < regularExpression.length; c++) {
//				System.out.println(regularExpression[c]);
//			}
//			System.out.println("String: ");
//			for (int c = 0; c < strings.length; c++) {
//				System.out.println(strings[c]);
//			}
//			System.out.println();
//			System.out.println();
			
			for (int c = 0; c < strings.length; c++) {
				for (int i = 0; i < regularExpression.length; i++) {
					if(strings[c].matches(regularExpression[i])){
						System.out.println("YES, "+(i+1));
						break;
					}
					else if(i==regularExpression.length-1){
						System.out.println("NO, 0");
					}
				}
			}

		} catch (Exception e) {
			System.out.println(e.toString());
		}
	}
}

// ade
// abcbcde

