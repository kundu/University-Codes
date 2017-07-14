import java.io.File;
import java.io.FileNotFoundException;
import java.util.LinkedList;
import java.util.Scanner;

public class Main {

	static int array[][] = new int[4][4];
	static LinkedList<String> possibleCombinations = new LinkedList<String>();
	static LinkedList<Integer> fNValues = new LinkedList<Integer>();
	static String input;

	public static void main(String[] args) throws FileNotFoundException {
		int totalCost=0;
		File f = new File("input");
		Scanner k = new Scanner(f);
		String s = "";
		while (k.hasNextLine()) {
			s = s + k.nextLine() + "\n";
		}
		input = s;

		while (getFN() != 0) {
			totalCost++;
			possibleCombinations = new LinkedList<String>();
			fNValues = new LinkedList<Integer>();
			makeArray(s);
			System.out.println("Minimum f(n) puzzle");
			printArray();
			System.out.println("Possible path");
			int temp[] = getNullIndex();
			int horizontal = temp[0];
			int verical = temp[1];

			if (horizontal - 1 > 0) {
				makeArray(s);
				int swap = array[horizontal - 1][verical];
				array[horizontal - 1][verical] = 0;
				array[horizontal][verical] = swap;
				printArray();
				System.out.println("f(n) " + getFN());
				// System.out.println(arrayToString());
				if (arrayToString() != input) {
					possibleCombinations.add(arrayToString());
					fNValues.add(getFN());
				}
			}
			if (horizontal + 1 < array.length) {
				makeArray(s);
				int swap = array[horizontal + 1][verical];
				array[horizontal + 1][verical] = 0;
				array[horizontal][verical] = swap;
				printArray();
				System.out.println("f(n) " + getFN());
				// System.out.println(arrayToString());
				if (arrayToString() != input) {
					possibleCombinations.add(arrayToString());
					fNValues.add(getFN());
				}
			}
			if (verical + 1 < array.length) {
				makeArray(s);
				int swap = array[horizontal][verical + 1];
				array[horizontal][verical + 1] = 0;
				array[horizontal][verical] = swap;
				printArray();
				System.out.println("f(n) " + getFN());
				// System.out.println(arrayToString());
				if (arrayToString() != input) {
					possibleCombinations.add(arrayToString());
					fNValues.add(getFN());
				}
			}
			if (verical - 1 > 0) {
				makeArray(s);
				int swap = array[horizontal][verical - 1];
				array[horizontal][verical - 1] = 0;
				array[horizontal][verical] = swap;
				printArray();
				System.out.println("f(n) " + getFN());
				// System.out.println(arrayToString());
				if (arrayToString() != input) {
					possibleCombinations.add(arrayToString());
					fNValues.add(getFN());
				}
			}

			s = possibleCombinations.get(getTheIndexOfMinimumFN());
			possibleCombinations = null;
			fNValues = null;
		}
		
		System.out.println("\nTotal Cost: "+totalCost+"\n");

	}

	private static int getTheIndexOfMinimumFN() {
		int save = fNValues.get(0);
		int index = 0;
		for (int c = 1; c < fNValues.size(); c++) {
			if (fNValues.get(c) < save) {
				save = fNValues.get(c);
				index = c;
			}
		}
		return index;
	}

	private static String arrayToString() {
		String s = "";
		for (int c = 1; c < array.length; c++) {
			for (int i = 1; i < array[c].length; i++) {
				s = s + array[c][i] + "\n";
			}
		}
		return s;
	}

	private static void printArray() {
		for (int c = 1; c < array.length; c++) {
			for (int i = 1; i < array[c].length; i++) {
				System.out.print(array[c][i] + " ");
			}
			System.out.println();
		}
	}

	private static int getFN() {
		int count = 0;

		if (array[1][1] != 1) {
			count++;
		}
		if (array[1][2] != 2) {
			count++;
		}
		if (array[1][3] != 3) {
			count++;
		}
		if (array[2][1] != 8) {
			count++;
		}
		if (array[2][2] != 0) {
		}
		if (array[2][3] != 4) {
			count++;
		}

		if (array[3][1] != 7) {
			count++;
		}
		if (array[3][2] != 6) {
			count++;
		}
		if (array[3][3] != 5) {
			count++;
		}

		return count;
	}

	private static int[] getNullIndex() {

		int temp[] = new int[2];
		for (int c = 1; c < array.length; c++) {
			for (int i = 1; i < array[c].length; i++) {
				if (array[c][i] == 0) {
					temp[0] = c;
					temp[1] = i;
					return temp;
				}
			}
		}
		return temp;
	}

	private static void makeArray(String s) {
		try {
			Scanner k = new Scanner(s);
			while (k.hasNextLine()) {
				for (int c = 1; c < array.length; c++) {
					for (int i = 1; i < array[c].length; i++) {
						array[c][i] = Integer.parseInt(k.nextLine());
					}
				}
			}

			// for (int c = 1; c < array.length; c++) {
			// for (int i = 1; i < array[c].length; i++) {
			// System.out.print(array[c][i] + " ");
			// }
			// System.out.println();
			// }
			// System.out.println("\nf(n) " + getFN());
			int temp[] = getNullIndex();
			// System.out.println("Null point " + temp[0] + " " + temp[1]);

		} catch (Exception e) {
			System.out.println(e.toString());
		}
	}
}
